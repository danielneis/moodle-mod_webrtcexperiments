Welcome to WebRTC Moodle Plugin!

This project uses the code from

    http://webrtc-experiment.com/

to implement an activity module for Moodle
to allow people to interact more freely!

This module currently offers:

* Add an activity module for users to create meetings
 * base on code from https://github.com/muaz-khan/WebRTC-Experiment/tree/master/meeting

But WebRTC is much more than that!

Future features:

* Screensharing
* Colaborative canvas
* Record sessions

This module needs a signaling server (https://github.com/muaz-khan/WebRTC-Experiment/blob/master/Signaling.md)

There is one websocket signaling server available at

    https://github.com/muaz-khan/WebRTC-Experiment/tree/master/websocket-over-nodejs

If you don't want (or dont feel the need to, or can't for any reason) to run your own server,
dont worry, this module will use the server below by default (under TLS)

    wss://novoaeon.com.br:12034 

Note that there is no warranty for this server to be up and running.
