<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Prints a particular instance of webrtcexperiments
 *
 * You can have a rather longer description of the file as well,
 * if you like, and it can span multiple lines.
 *
 * @package    mod_webrtcexperiments
 * @copyright  2014 Daniel Neis Araujo
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require_once(dirname(dirname(dirname(__FILE__))).'/config.php');
require_once(dirname(__FILE__).'/lib.php');

$id = optional_param('id', 0, PARAM_INT); // Course_module ID, or
$n  = optional_param('n', 0, PARAM_INT);  // ... webrtc instance ID - it should be named as the first character of the module.

if ($id) {
    $cm         = get_coursemodule_from_id('webrtcexperiments', $id, 0, false, MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $cm->course), '*', MUST_EXIST);
    $webrtc  = $DB->get_record('webrtcexperiments', array('id' => $cm->instance), '*', MUST_EXIST);
} else if ($n) {
    $webrtc  = $DB->get_record('webrtcexperiments', array('id' => $n), '*', MUST_EXIST);
    $course     = $DB->get_record('course', array('id' => $webrtc->course), '*', MUST_EXIST);
    $cm         = get_coursemodule_from_instance('webrtcexperiments', $webrtc->id, $course->id, false, MUST_EXIST);
} else {
    error('You must specify a course_module ID or an instance ID');
}

require_login($course, true, $cm);
$context = context_module::instance($cm->id);

$event = mod_webrtcexperiments\event\course_module_viewed::create(array(
    'objectid' => $PAGE->cm->instance,
    'context' => $PAGE->context,
));
$event->add_record_snapshot('course', $PAGE->course);
// In the next line you can use $PAGE->activityrecord if you have set it, or skip this line if you don't have a record.
$event->add_record_snapshot($PAGE->cm->modname, $webrtc);
$event->trigger();

// Print the page header.

$PAGE->set_url('/mod/webrtcexperiments/view.php', array('id' => $cm->id));
$PAGE->set_title(format_string($webrtc->name));
$PAGE->set_heading(format_string($course->fullname));
$PAGE->set_context($context);

// Output starts here.
echo $OUTPUT->header();


// Conditions to show the intro can change to look for own settings or whatever.
if ($webrtc->intro) {
    echo $OUTPUT->box(format_module_intro('webrtcexperiments', $webrtc, $cm->id), 'generalbox mod_introbox', 'ebrtcintro');
}
?>
<section class="experiment">
    <div class="make-center">
        <input type="text" id="room-id" value="<?php echo $id; ?>">
        <button id="open-room">Open Room</button>
        <button id="join-room">Join Room</button>
        <button id="open-or-join-room"><?php echo get_string('join', 'mod_webrtcexperiments') ?></button>

        <br><br>
        <input type="text" id="input-text-chat" placeholder="Enter Text Chat" disabled>
        <button id="share-file" disabled>Share File</button>
        <br><br>
        <button id="btn-leave-room" disabled>Leave /or close the room</button>

        <div id="room-urls" style="text-align: center;display: none;background: #F1EDED;margin: 15px -10px;border: 1px solid rgb(189, 189, 189);border-left: 0;border-right: 0;"></div>
    </div>

    <div id="chat-container">
        <div id="file-container"></div>
        <div class="chat-output"></div>
    </div>

    <div id="videos-container"></div>
</section>
<?php

$PAGE->requires->js(new moodle_url("https://cdn.webrtc-experiment.com:443/RTCMultiConnection.js"));
$PAGE->requires->js(new moodle_url("https://cdn.webrtc-experiment.com:443/rmc3.fbr.min.js"));
$PAGE->requires->js(new moodle_url("https://cdn.webrtc-experiment.com:443/getMediaElement.js"));
$PAGE->requires->js(new moodle_url("https://rtcmulticonnection.herokuapp.com/socket.io/socket.io.js"));
$PAGE->requires->js(new moodle_url("https://cdn.webrtc-experiment.com/getMediaElement.js"));

$PAGE->requires->js_init_call('M.mod_webrtcexperiments.init_meeting', array($webrtc->signalingserver, fullname($USER)));

// Finish the page.
echo $OUTPUT->footer();
