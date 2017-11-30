<?php
  require_once 'model/Page.class.php';
  require_once 'model/Templating.class.php';
  require_once 'model/Blog.class.php';
  require_once 'model/User.class.php';

  class pageController {
    private $Page;
    private $Templating;
    private $Blog;
    private $User;

    public function __construct() {
      $this->Page = new Page();
      $this->Templating = new Templating();
      $this->Blog = new Blog();
      $this->User = new User();
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
        include 'view/header.php';
          include 'view/404.html';
        include 'view/footer.php';
      }
    }


    /**
     * Gets a overview of all pages
     */
    public function getAllPages() {
      if ($this->User->checkIfClientHasAcces('admin')) {
        $allPages = $this->Page->getAllPages();

        if ($allPages != false) {
          include 'view/page/header.php';
            include 'view/page/getAllPages/page-overview.php';
          include 'view/page/footer.php';
        }

        else {
          // No pages
          include 'view/page/header.php';
            include 'view/page/getAllPages/no-pages.php';
          include 'view/page/footer.php';
        }
      }

      else {
        // No acces redurect to the login
        header("Location: " . $GLOBALS['config']['base_url'] . "admin/");
      }
    }

    /**
     * Presents a view where you can edit a page
     * @param  [array] $pageID [The ID of a page on postition,0]
     */
    public function edit($pageID) {
      if ($this->User->checkIfClientHasAcces('admin')) {
        if (ISSET($pageID[0])) {
          $pageContent = $this->Page->getPage($pageID[0]);

          if ($pageContent != false) {
            // We have result
            $pageTitle;
            $pageContent;
            $pageID = $pageID[0];
            foreach ($pageContent as $page) {
              $pageTitle = $page['post-title'];
              $pageContent = $page['post-content'];
              break;
            }
            include 'view/page/header.php';
              include 'view/page/edit/editPage.php';
            include 'view/page/footer.php';
          }

          else {
            // Page doesn't exists
          }
        }

        else {
          // Came here by excident
        }
      }

      else {
        // No acces
      }

    }

    /**
     * Updates a page to the db
     * @param  [array] $pageID [The ID of the page]
     */
    public function updatePage($pageID) {
      if ($this->User->checkIfClientHasAcces('admin')) {
        if (ISSET($pageID[0])) {
          // we have a page ID
          $pageID = $pageID[0];
          $pageTitle = $_POST['pageTitle'];
          $pageContent = $_POST['pageContent'];

          $this->Page->updatePage($pageID, $pageTitle, $pageContent);
          header("Location: " . $GLOBALS['config']['base_url'] . "page/edit/" . $pageID);
        }

        else {
          // No page ID
        }
      }

      else {
        // No acces
      }
    }

    /**
     * Presents a confirm to the client to delete a page
     * @param  [array] $pageID [The ID of the page]
     */
    public function deletePage($pageID) {
      if ($this->User->checkIfClientHasAcces('admin')) {
        if (ISSET($pageID[0])) {
          $pageID = $pageID[0];
          $pageTitle = $this->Page->getPageTitle($pageID);

          if ($pageTitle != false) {
            // We have a page
            include 'view/page/header.php';
              include 'view/page/deletePage/deleteConfirm.php';
            include 'view/page/footer.php';
          }

          else {
            // No page
          }
        }

        else {
          // Client came here by excident
        }
      }

      else {
        // No acces
      }
    }

    /**
     * Presents a view to the client to add a new page
     */
    public function createPage() {
      if ($this->User->checkIfClientHasAcces('admin')) {
        include 'view/page/header.php';
          include 'view/page/createPage/createPage.php';
        include 'view/page/footer.php';
      }

      else {
        // No acces
        header("Location: " . $GLOBALS['config']['base_url'] . "admin/");
      }
    }

    public function addPage() {
      if ($this->User->checkIfClientHasAcces('admin')) {
        if (ISSET($_POST['createPage'])) {
          
        }

        else {
          // Came here by excident
        }
      }

      else {
        // No acces
      }
    }

  }


?>
