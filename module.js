M.mod_webrtcexperiments = {};

M.mod_webrtcexperiments.init_meeting = function(Y, signalingserver) {

    var meeting = new Meeting();

    var meetingsList = document.getElementById('meetings-list');
    var meetingRooms = {};
    meeting.onmeeting = function (room) {
        if (meetingRooms[room.roomid]) {
            return;
        }
        meetingRooms[room.roomid] = room;

        var tr = document.createElement('tr');
        tr.innerHTML = '<td>' + room.roomid + '</td>' +
            '<td><button class="join">Join</button></td>';

        var loading = document.getElementById('loading-list');
        loading.parentNode.removeChild(loading);
        meetingsList.appendChild(tr);

        // when someone clicks table-row; joining the relevant meeting room
        tr.onclick = function () {
            room = meetingRooms[room.roomid];

            // manually joining a meeting room
            if (room) {
                meeting.meet(room);
            }

            meetingsList.style.display = 'none';
        };
    };

    var remoteMediaStreams = document.getElementById('remote-streams-container');
    var localMediaStream = document.getElementById('local-streams-container');

    // on getting media stream
    meeting.onaddstream = function (e) {
        if (e.type == 'local') {
            localMediaStream.appendChild(e.video);
        }
        if (e.type == 'remote') {
            remoteMediaStreams.insertBefore(e.video, remoteMediaStreams.firstChild);
        }
    };

    meeting.openSignalingChannel = function(onmessage) {
            var channel = location.href.replace(/\/|:|#|%|\.|\[|\]/g, '');
            var websocket = new WebSocket(signalingserver);
            websocket.onopen = function () {
                    websocket.push(JSON.stringify({
                            open: true,
                            channel: channel
                    }));
            };
            websocket.push = websocket.send;
            websocket.send = function (data) {
                    if (websocket.readyState != 1) {
                            return setTimeout(function() {
                                    websocket.send(data);
                            }, 300);
                    }

                    websocket.push(JSON.stringify({
                            data: data,
                            channel: channel
                    }));
            };
            websocket.onmessage = function(e) {
                    onmessage(JSON.parse(e.data));
            };
            return websocket;
    };

    // If someone leaves; just remove his video.
    meeting.onuserleft = function (userid) {
        var video = document.getElementById(userid);
        if (video) {
            video.parentNode.removeChild(video);
        }
    };

    // Check pre-created meeting rooms.
    meeting.check();

    document.getElementById('setup-meeting').onclick = function () {
        // setup new meeting room
        var meetingRoomName = 'Simple Meeting';
        meeting.setup(meetingRoomName);

        this.disabled = true;
    };

    document.getElementById('leave-meeting').onclick = function () {
        meeting.leave();
    }
}
