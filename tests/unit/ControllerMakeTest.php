<?php

/**
 * Testing the controller functionality.
 *
 * @category  Testing
 * @package   XH
 * @author    The CMSimple_XH developers <devs@cmsimple-xh.org>
 * @copyright 2014-2017 The CMSimple_XH developers <http://cmsimple-xh.org/?The_Team>
 * @license   http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @link      http://cmsimple-xh.org/
 */

namespace XH;

use PHPUnit_Extensions_MockFunction;
use org\bovigo\vfs\vfsStreamWrapper;
use org\bovigo\vfs\vfsStreamDirectory;
use org\bovigo\vfs\vfsStream;

/**
 * Testing the factory methods.
 *
 * @category Testing
 * @package  XH
 * @author   The CMSimple_XH developers <devs@cmsimple-xh.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @link     http://cmsimple-xh.org/
 * @since    1.6.3
 */
class ControllerMakeTest extends TestCase
{
    /**
     * The test subject.
     *
     * @var Controller
     */
    protected $subject;

    /**
     * Sets up the test fixture.
     *
     * @return void
     */
    public function setUp()
    {
        $this->subject = new Controller();
    }

    /**
     * Tests ::makeSearch().
     *
     * @return void
     */
    public function testMakeSearch()
    {
        $this->assertInstanceOf('XH\Search', $this->subject->makeSearch());
    }

    /**
     * Tests ::makeMailform().
     *
     * @return void
     */
    public function testMakeMailform()
    {
        $this->assertInstanceOf('XH\Mailform', $this->subject->makeMailform());
    }

    /**
     * Tests ::makePasswordForgotten().
     *
     * @return void
     */
    public function testMakePasswordForgotten()
    {
        $this->assertInstanceOf('XH\PasswordForgotten', $this->subject->makePasswordForgotten());
    }

    /**
     * Tests ::makePageDataEditor().
     *
     * @return void
     */
    public function testMakePageDataEditor()
    {
        $this->assertInstanceOf('XH\PageDataEditor', $this->subject->makePageDataEditor());
    }
}