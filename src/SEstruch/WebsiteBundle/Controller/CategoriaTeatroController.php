<?php

namespace SEstruch\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\View\TwitterBootstrapView;

use SEstruch\WebsiteBundle\Entity\CategoriaTeatro;
use SEstruch\WebsiteBundle\Form\CategoriaTeatroType;
use SEstruch\WebsiteBundle\Form\CategoriaTeatroFilterType;

/**
 * CategoriaTeatro controller.
 *
 * @Route("/admin/categoriateatro", options={"i18n"=false})
 */
class CategoriaTeatroController extends Controller
{
    /**
     * Lists all CategoriaTeatro entities.
     *
     * @Route("/", name="admin_categoriateatro")
     * @Template()
     */
    public function indexAction()
    {
        list($filterForm, $queryBuilder) = $this->filter();

        list($entities, $pagerHtml) = $this->paginator($queryBuilder);

    
        return array(
            'entities' => $entities,
            'pagerHtml' => $pagerHtml,
            'filterForm' => $filterForm->createView(),
        );
    }

    /**
     * Lists all CategoriaTeatro entities.
     *
     * @Route("/{catId}/obras", requirements={"catId" = "\d+"}, name="admin_obrascategoriateatro")
     * @Template()
     */
    public function obrasAction($catId)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaTeatro')->find($catId);
        if (!$entity instanceof CategoriaTeatro) {
            throw $this->createNotFoundException('Categoria Teatro not found');
        }

        return array(
            'entity' => $entity,
        );
    }

    /**
    * Create filter form and process filter request.
    *
    */
    protected function filter()
    {
        $request = $this->getRequest();
        $session = $request->getSession();
        $filterForm = $this->createForm(new CategoriaTeatroFilterType());
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('SEstruchWebsiteBundle:CategoriaTeatro')->createQueryBuilder('e');
    
        // Reset filter
        if ($request->getMethod() == 'POST' && $request->get('filter_action') == 'reset') {
            $session->remove('CategoriaTeatroControllerFilter');
        }
    
        // Filter action
        if ($request->getMethod() == 'POST' && $request->get('filter_action') == 'filter') {
            // Bind values from the request
            $filterForm->bind($request);

            if ($filterForm->isValid()) {
                // Build the query from the given form object
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
                // Save filter to session
                $filterData = $filterForm->getData();
                $session->set('CategoriaTeatroControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('CategoriaTeatroControllerFilter')) {
                $filterData = $session->get('CategoriaTeatroControllerFilter');
                $filterForm = $this->createForm(new CategoriaTeatroFilterType(), $filterData);
                $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($filterForm, $queryBuilder);
            }
        }
    
        return array($filterForm, $queryBuilder);
    }

    /**
    * Get results from paginator and get paginator view.
    *
    */
    protected function paginator($queryBuilder)
    {
        // Paginator
        $adapter = new DoctrineORMAdapter($queryBuilder);
        $pagerfanta = new Pagerfanta($adapter);
        $currentPage = $this->getRequest()->get('page', 1);
        $pagerfanta->setCurrentPage($currentPage);
        $entities = $pagerfanta->getCurrentPageResults();
    
        // Paginator - route generator
        $me = $this;
        $routeGenerator = function($page) use ($me)
        {
            return $me->generateUrl('admin_categoriateatro', array('page' => $page));
        };
    
        // Paginator - view
        $translator = $this->get('translator');
        $view = new TwitterBootstrapView();
        $pagerHtml = $view->render($pagerfanta, $routeGenerator, array(
            'proximity' => 3,
            'prev_message' => $translator->trans('views.index.pagprev', array(), 'JordiLlonchCrudGeneratorBundle'),
            'next_message' => $translator->trans('views.index.pagnext', array(), 'JordiLlonchCrudGeneratorBundle'),
        ));
    
        return array($entities, $pagerHtml);
    }
    
    /**
     * Finds and displays a CategoriaTeatro entity.
     *
     * @Route("/{id}/show", name="admin_categoriateatro_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaTeatro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategoriaTeatro entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new CategoriaTeatro entity.
     *
     * @Route("/new", name="admin_categoriateatro_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CategoriaTeatro();
        $form   = $this->createForm(new CategoriaTeatroType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new CategoriaTeatro entity.
     *
     * @Route("/create", name="admin_categoriateatro_create")
     * @Method("post")
     * @Template("SEstruchWebsiteBundle:CategoriaTeatro:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new CategoriaTeatro();
        $request = $this->getRequest();
        $form    = $this->createForm(new CategoriaTeatroType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('admin_categoriateatro_show', array('id' => $entity->getId())));        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.create.error');
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Displays a form to edit an existing CategoriaTeatro entity.
     *
     * @Route("/{id}/edit", name="admin_categoriateatro_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaTeatro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategoriaTeatro entity.');
        }

        $editForm = $this->createForm(new CategoriaTeatroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing CategoriaTeatro entity.
     *
     * @Route("/{id}/update", name="admin_categoriateatro_update")
     * @Method("post")
     * @Template("SEstruchWebsiteBundle:CategoriaTeatro:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaTeatro')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategoriaTeatro entity.');
        }

        $editForm   = $this->createForm(new CategoriaTeatroType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('admin_categoriateatro_edit', array('id' => $id)));
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.update.error');
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CategoriaTeatro entity.
     *
     * @Route("/{id}/delete", name="admin_categoriateatro_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaTeatro')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CategoriaTeatro entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('admin_categoriateatro'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
