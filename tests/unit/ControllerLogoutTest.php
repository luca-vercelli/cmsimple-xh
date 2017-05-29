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
 * Testing the handling of logout requests.
 *
 * @category Testing
 * @package  XH
 * @author   The CMSimple_XH developers <devs@cmsimple-xh.org>
 * @license  http://www.gnu.org/licenses/gpl-3.0.en.html GNU GPLv3
 * @link     http://cmsimple-xh.org/
 * @since    1.6.3
 */
class ControllerLogoutTest extends ControllerLogInOutTestCase
{
    /**
     * The XH_backup() mock.
     *
     * @var object
     */
    protected $backupMock;

    /**
     * Sets up the test fixture.
     *
     * @return void
     *
     * @global PasswordHash The password hasher.
     * @global array        The configuration of the core.
     */
    public function setUp()
    {
        parent::setUp();
        $_SESSION = array();
        $this->backupMock = new PHPUnit_Extensions_MockFunction('XH_backup', $this->subject);
        new PHPUnit_Extensions_MockFunction('file_put_contents', $this->subject);
    }

    /**
     * Tests that logout makes backups.
     *
     * @return void
     */
    public function testMakesBackups()
    {
        $this->backupMock->expects($this->once());
        $this->subject->handleLogout();
    }

    /**
     * Tests that logout deletes the status cookie.
     *
     * @return void
     */
    public function testDeletesStatusCookie()
    {
        $this->setcookieMock->expects($this->any())->with('status', '');
        $this->subject->handleLogout();
    }

    /**
     * Tests that logout regenerates the session id.
     *
     * @return void
     */
    public function testRegeneratesSessionId()
    {
        $this->sessionRegenerateIdMock->expects($this->once())->with(true);
        $this->subject->handleLogout();
    }

    /**
     * Tests that logout unsets the session variable.
     *
     * @return void
     */
    public function testUnsetsSessionVariable()
    {
        $this->subject->handleLogout();
        $this->assertArrayNotHasKey('xh_password', $_SESSION);
    }

    /**
     * Tests that logout sets $f.
     *
     * @return void
     *
     * @global string The requested function.
     */
    public function testSetsF()
    {
        global $f;

        $this->subject->handleLogout();
        $this->assertEquals('xh_loggedout', $f);
    }
}