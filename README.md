Welcome to WebRTC Moodle Plugin!

This project uses the code from

    http://webrtc-experiment.com/

to implement an activity module for Moodle
to allow people to interact more freely!

This module currently offers:

* Video and audio chat
** With mute/unmute controls for audio and video
* Record video and audio from any peer (or local stream) and save to your computer
* Text chat
* File sharing

It is basically a copy of the all-in-one demo:

https://www.webrtc-experiment.com/RTCMultiConnection/all-in-one.html

But WebRTC is much more than that!

Future features:

* Screensharing
* Colaborative canvas

This module needs a signaling server (https://github.com/muaz-khan/WebRTC-Experiment/blob/master/Signaling.md)

There is one websocket signaling server available at

    https://github.com/muaz-khan/WebRTC-Experiment/tree/master/websocket-over-nodejs

If you don't want (or don't feel the need to, or cannot, for any reason) to run your own server,
don't worry, this module will use the server below by default (under TLS)

    wss://novoaeon.com.br:12034 

Note that there is no warranty for this server to be up and running.
