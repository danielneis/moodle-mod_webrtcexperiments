WebRTC Moodle Plugin
====================

Welcome to WebRTC Moodle Plugin!

This project uses the code from

    http://webrtc-experiment.com/

to implement an activity module for Moodle to allow people to interact more freely!

Features
========

* Video and audio chat
 * With mute/unmute controls for audio and video
* Record video and audio from any peer (or local stream) and save to your computer
* Text chat
* File sharing
 * It is P2P file sharing, not integrated with Moodle Files API

It is basically a copy of the all-in-one demo:

    https://www.webrtc-experiment.com/RTCMultiConnection/all-in-one.html

But WebRTC is much more than that!

Future features
===============

* Screensharing
* Colaborative canvas

Install
=======

* Put this code under "youmoodlerootdir/mod/webrtcexperiments"
* Visit your Moodle site as administrator to install module via interface

Signaling Server
================

This module needs a signaling server (https://github.com/muaz-khan/WebRTC-Experiment/blob/master/Signaling.md)

There is one websocket signaling server available at

    https://github.com/muaz-khan/WebRTC-Experiment/tree/master/websocket-over-nodejs

If you don't want (or don't feel the need to, or cannot, for any reason) to run your own server,
don't worry, this module will use the server below by default (under TLS)

    wss://novoaeon.com.br:12034 

Note that there is no warranty for this server to be up and running.

Contact
=======

Feel free to contact me at danielneis@gmail.com .

If you have problems using the plugin the plugin or would like to see a new feature implemented, please visit https://github.com/danielneis/moodle-mod_webrtcexperiments/issuse

If you like the plugin and want to say hi publicly instead of sending an email, leave a comment at https://moodle.org/plugins/view.php?plugin=mod_webrtcexperiments
