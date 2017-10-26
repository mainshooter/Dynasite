<?php
  require_once 'model/Page.class.php';
  require_once 'model/Templating.class.php';
  require_once 'model/Blog.class.php';

  class pageController {
    private $Page;
    private $Templating;
    private $Blog;

    public function __construct() {
      $this->Page = new Page();
      $this->Templating = new Templating();
      $this->Blog = new Blog();
    }


    public function index() {
      $pageTitle = 'home';
      $pageContent = $this->Page->getPageContent($pageTitle);

      $blogPosts = $this->Blog->getHomeBlogPosts();

      $this->Templating->getTemplateContent('view/tpl/home.html');
      $replaceTags = array(
        "page-title" => 'home',
        "page-content" => $pageContent,
        'first-blog-title' => $blogPosts[0]['post-title'],
        'first-blog-content' => $blogPosts[0]['post-content'],
        'second-blog-title' => $blogPosts[1]['post-title'],
        'second-blog-content' => $blogPosts[1]['post-content']
      );
      $this->Templating->replaceTemplateTags($replaceTags);

      include 'view/header.php';
        echo $this->Templating->getfinishedTemplate();
      include 'view/footer.php';
    }

    public function goto($pageTitle) {
      $pageTitle = $pageTitle[0];
      $pageContent = $this->Page->getPageContent($pageTitle);

      if ($pageContent != false) {
        // We have result
        $this->Templating->getTemplateContent('view/tpl/contact.html');
        $replaceTags = array(
          "page-title" => $pageTitle,
          "page-content" => $pageContent,
        );
        $this->Templating->replaceTemplateTags($replaceTags);

        include 'view/header.php';
          echo $this->Templating->getfinishedTemplate();
        include 'view/footer.php';
      }

      else {
        // Presents 404
      }
    }

    public function blog() {

    }

  }


?>
