<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

// use Anax\Route\Exception\ForbiddenException;
// use Anax\Route\Exception\NotFoundException;
// use Anax\Route\Exception\InternalErrorException;

/**
 * A sample controller to show how a controller class can be implemented.
 * The controller will be injected with $di if implementing the interface
 * ContainerInjectableInterface, like this sample class does.
 * The controller is mounted on a particular route and can then handle all
 * requests for that mount point.
 *
 * @SuppressWarnings(PHPMD.TooManyPublicMethods)
 */
class BookController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;



    /**
     * @var string $db a sample member variable that gets initialised
     */
    // private $db = "not active";



    /**
     * The initialize method is optional and will always be called before the
     * target method/action. This is a convienient method where you could
     * setup internal properties that are commonly used by several methods.
     *
     * @return void
     */
    public function initialize() : void
    {
        // Use to initialise member variables.
        // $this->db = "active";
    }

    public function indexAction() : object
    {
        $page = $this->di->get("page");

        $db = $this->di->get("db");
        $res = $db->connect()->execute("SELECT * FROM Book")->fetchAll();

        $page->add("anax/book/index", [
            "books" => $res
        ]);

        return $page->render();
    }

    public function deleteAction() : object {
        $page = $this->di->get("page");
        
        $db = $this->di->get("db");
        $res = $db->connect()->execute("SELECT * FROM Book")->fetchAll();

        $page->add("anax/book/delete", [
            "books" => $res
        ]);

        return $page->render();
    }

    public function deleteActionPost(): string {
        $req = $this->di->get("request");
        $db = $this->di->get("db");

        $id = $req->getPost("bookid");

        if ($id) {
            $db->connect()->execute("DELETE FROM Book WHERE id = $id");
        }

        header("Location: delete");

        return "deleted";
    }

    public function createAction() : object {
        $page = $this->di->get("page");
        
        $db = $this->di->get("db");
        $res = $db->connect()->execute("SELECT * FROM Book")->fetchAll();

        $page->add("anax/book/create", [
            "books" => $res
        ]);

        return $page->render();
    }

    public function createActionPost(): string {
        $req = $this->di->get("request");
        $db = $this->di->get("db");
        
        $title = $req->getPost("title");
        $author = $req->getPost("author");
        $img = $req->getPost("img");

        if ($title && $author) {
            $db->connect()->execute("INSERT INTO Book ('title', 'author', 'img') VALUES('$title', '$author', '$img')");
        }

        header("Location: ../book");

        return "created";
    }

    public function testActionPost() : string
    {
        $db = $this->di->get("db");

        $res = $db->connect()->execute("SELECT * FROM Book")->fetch();

        var_dump($res);
    }
}
