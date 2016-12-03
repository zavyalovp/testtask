<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
        ]);


    }

    /**
     * @Route("/login", name="loginpage")
     */
    public function loginAction(Request $request)
    {
        $fb = new \Facebook\Facebook([
            'app_id' => '1107911215974196',
            'app_secret' => '3d146bb36b784d69f5daaefaaa670a46',
            'default_graph_version' => 'v2.5',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $permissions = ['email', 'user_likes']; // optional
        $loginUrl = $helper->getLoginUrl('http://{your-website}/login-callback.php', $permissions);

        echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

        return $this->render('default/login.html.twig', ['data' => ['hello']]);
    }

    /**
     * @Route("/login2", name="loginpage2")
     */
    public function login2Action(Request $request)
    {
        $get = $request->query->all();

        $post = $request->request->all();

        return $this->json(['post' => $post, 'get' => $get]);

        return $this->renderJ('default/login2.html.twig', ['post' => $post, 'get' => $get]);
    }
}
