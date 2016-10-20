Session
=======

You can use this library to help unit test applications that have a reliance on the session in some way.

Rationale
---------

Unit tests are better when they are completely isolated from the environment in which they are run, and don't ever
access parts of that environment such as databases, file system, network sockets or even the current time.

It is deliberately ultra-simple, with no frills, containing just enough to achieve the required results without any
added complexity.

Installing
----------

Session requires PHP 7. Install via composer:

    composer require cemerson/session

Usage
-----

Whenever you have a class that needs to access the session, don't use the `$_SESSION` global in PHP. Instead, hint for
and inject the `Session` interface from this library, and use the methods on that to manipulate session data.

In production, you can set up your dependency injection container to inject the provided `DefaultPHPSession` class to
manipulate the default PHP `$_SESSION` global.

    <?php declare(strict_types = 1);
     
    namespace MyVendor\MyApp;
     
    use CEmerson\Session\Session;
     
    class MyClass
    {
        /** @var Session */
        private $session;
        
        public function __construct(Session $session)
        {
            $this->session = $session;
        }
        
        public function myMethodThatNeedsToAccessSessionData()
        {
            $someVar = $this->session->get('varname');
            
            /* ... */
            
            $this->session->set('varname', 'newvalue');
        }
        
        public function youCanAlsoUseArrayAccess()
        {
            $someVar = $this->session['varname'];
            
            /* ... */
            
            $this->session['varname'] = 'newvalue';
        }
        
        public function orEvenPropertyAccessMagicMethods()
        {
            $someVar = $this->session->varname;
            
            /* ... */
            
            $this->session->varname = 'newvalue';
        }
    }

Alternatively, create your own implementation of the `Session` interface if you need some different functionality, or
you want to create an adapter to a different session library instead. An Abstract class is provided that performs all
the boilerplate code to implement the ArrayAccess and 'magic' property access methods, leaving you only needing to
implement `get`, `set`, `isset` and `unset`.

During testing, you can create a mock of the `Session` interface to provide whatever session data you like using your
favourite mocking framework, or even using your least favourite one.
