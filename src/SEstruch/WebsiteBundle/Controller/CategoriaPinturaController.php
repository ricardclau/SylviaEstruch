<?php

namespace SEstruch\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Pagerfanta\Pagerfanta;
use Pagerfanta\Adapter\DoctrineORMAdapter;
use Pagerfanta\View\TwitterBootstrapView;

use SEstruch\WebsiteBundle\Entity\CategoriaPintura;
use SEstruch\WebsiteBundle\Form\CategoriaPinturaType;
use SEstruch\WebsiteBundle\Form\CategoriaPinturaFilterType;

/**
 * CategoriaPintura controller.
 *
 * @Route("/admin/categoriapintura", options={"i18n"=false})
 */
class CategoriaPinturaController extends Controller
{
    /**
     * Lists all CategoriaPintura entities.
     *
     * @Route("/", name="admin_categoriapintura")
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
     * Lists all CategoriaPintura entities.
     *
     * @Route("/{catId}/obras", requirements={"catId" = "\d+"}, name="admin_obrascategoriapintura")
     * @Template()
     */
    public function obrasAction($catId)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaPintura')->find($catId);
        if (!$entity instanceof CategoriaPintura) {
            throw $this->createNotFoundException('Categoria Pintura not found');
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
        $filterForm = $this->createForm(new CategoriaPinturaFilterType());
        $em = $this->getDoctrine()->getManager();
        $queryBuilder = $em->getRepository('SEstruchWebsiteBundle:CategoriaPintura')->createQueryBuilder('e');
    
        // Reset filter
        if ($request->getMethod() == 'POST' && $request->get('filter_action') == 'reset') {
            $session->remove('CategoriaPinturaControllerFilter');
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
                $session->set('CategoriaPinturaControllerFilter', $filterData);
            }
        } else {
            // Get filter from session
            if ($session->has('CategoriaPinturaControllerFilter')) {
                $filterData = $session->get('CategoriaPinturaControllerFilter');
                $filterForm = $this->createForm(new CategoriaPinturaFilterType(), $filterData);
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
            return $me->generateUrl('admin_categoriapintura', array('page' => $page));
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
     * Finds and displays a CategoriaPintura entity.
     *
     * @Route("/{id}/show", name="admin_categoriapintura_show")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaPintura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategoriaPintura entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to create a new CategoriaPintura entity.
     *
     * @Route("/new", name="admin_categoriapintura_new")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CategoriaPintura();
        $form   = $this->createForm(new CategoriaPinturaType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a new CategoriaPintura entity.
     *
     * @Route("/create", name="admin_categoriapintura_create")
     * @Method("post")
     * @Template("SEstruchWebsiteBundle:CategoriaPintura:new.html.twig")
     */
    public function createAction()
    {
        $entity  = new CategoriaPintura();
        $request = $this->getRequest();
        $form    = $this->createForm(new CategoriaPinturaType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.create.success');

            return $this->redirect($this->generateUrl('admin_categoriapintura_show', array('id' => $entity->getId())));        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.create.error');
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }
    /**
     * Displays a form to edit an existing CategoriaPintura entity.
     *
     * @Route("/{id}/edit", name="admin_categoriapintura_edit")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaPintura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategoriaPintura entity.');
        }

        $editForm = $this->createForm(new CategoriaPinturaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing CategoriaPintura entity.
     *
     * @Route("/{id}/update", name="admin_categoriapintura_update")
     * @Method("post")
     * @Template("SEstruchWebsiteBundle:CategoriaPintura:edit.html.twig")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaPintura')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CategoriaPintura entity.');
        }

        $editForm   = $this->createForm(new CategoriaPinturaType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.update.success');

            return $this->redirect($this->generateUrl('admin_categoriapintura_edit', array('id' => $id)));
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
     * Deletes a CategoriaPintura entity.
     *
     * @Route("/{id}/delete", name="admin_categoriapintura_delete")
     * @Method("post")
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('SEstruchWebsiteBundle:CategoriaPintura')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CategoriaPintura entity.');
            }

            $em->remove($entity);
            $em->flush();
            $this->get('session')->getFlashBag()->add('success', 'flash.delete.success');
        } else {
            $this->get('session')->getFlashBag()->add('error', 'flash.delete.error');
        }

        return $this->redirect($this->generateUrl('admin_categoriapintura'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
