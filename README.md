WebRTC Moodle Plugin
====================

Welcome to WebRTC Moodle Plugin!

This project uses the code from

    http://webrtc-experiment.com/

to implement an activity module for Moodle to allow people to interact more freely.

Everything you need to start communicating using
your webcam and microphone is an updated browser
like Firefox or Chrome. There is no need to install
any third-party plugins on your browser.
There is no flash here.

Also, this plugin transfer data (audio and video)
in a P2P (peer-to-peer) fashion. This way, data is sent
directly from one user computer to another. There is
no dependency on a "central server" or a "streaming server".

The only dependency on a server is for "signaling events"
like room creations, and users joining and leaving.
See more about it on the "Signaling server" section of this
document.

Features
========

* Video and audio chat
 * With mute/unmute controls for audio and video
* Record video and audio from any peer (or local stream) and save to your computer
* Text chat
* File sharing
 * It is P2P file sharing, not integrated with Moodle Files API
* The icon was downloaded from pixabay and is licensed under CC0 Public Domain
 * http://pixabay.com/en/connection-network-router-cable-27386/

It is basically a copy of the all-in-one demo:

    https://www.webrtc-experiment.com/RTCMultiConnection/all-in-one.html

But WebRTC is much more than that!

Future features
===============

* Screensharing
* Colaborative canvas

Moodle Versions
===============

This plugin was tested in version 2.7 and 2.8 of Modle.
If you get this plugin working on ther version, please
let everybody know at:

    https://github.com/danielneis/moodle-mod_webrtcexperiments/issues

Install
=======

* Put this code under "youmoodlerootdir/mod/webrtcexperiments"
* Visit your Moodle site as administrator to install plugin via web interface

Signaling Server
================

This module needs a signaling server.
To learn more about Signaling, please visit:

    https://github.com/muaz-khan/WebRTC-Experiment/blob/master/Signaling.md

If you don't want (or don't feel the need to, or cannot,
for any reason) to run your own server, don't worry,
this module will use the server below by default (under TLS)

    wss://novoaeon.com.br:12034

Note that there is no warranty for this server to be up and running.
This server runs a websocket server over node.js that can be found at

    https://github.com/muaz-khan/WebRTC-Experiment/tree/master/websocket-over-nodejs

Contact
=======

Feel free to contact me at danielneis@gmail.com .

If you have problems using the plugin the plugin or would like
to see a new feature implemented, please visit

    https://github.com/danielneis/moodle-mod_webrtcexperiments/issues

If you like the plugin and want to say hi publicly instead of
sending an email, leave a comment at

    https://moodle.org/plugins/view.php?plugin=mod_webrtcexperiments
