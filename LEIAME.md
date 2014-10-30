WebRTC Moodle Plugin
====================

Bem vindo ao WebRTC Moodle Plugin!

Este projeto usa código de

    http://webrtc-experiment.com/

para implementar um módulo de atividades do Moodle
que permite às pessoas comunicarem-se mais livrevemte.

Tudo que você precisa para começar a comunicar
utilizando sua webcam e seu microfone é
um navegador web atualizado, como o Firefox ou Chrome.
Não é necessário instalar nenhum plugin no navegador.
Não precisa de Flash.

Além disso, o plugin transmite vídeo e áudio de
forma ponto-a-ponto, P2P, peer-to-peer, ou seja,
diretamente entre os computadores dos usuários,
sem passar por um "servidor central" ou "servidor de sreaming".

A única dependência de um servidor é para a sinalização
dos eventos de criação de salas, entrada e saída de usuários
e outros controles. Veja mais sobre isso na sessão
"Servidor de sinalização" deste documento.

Funcionalidades
===============

* Chat de áudio e vídeo
 * Com controles para ativar/desativar o áudio e vídeo
* Gravação de áudio e vídeo de qualquer usuário (inclusive local)
* Chat de text
* Compartilhamento de arquivos
 * De forma P2P, sem integração com a API de arquivos do Moodle
* O ícone foi baixado do pixabay e está licensiado sob CC0 Public Domain
 * http://pixabay.com/en/connection-network-router-cable-27386/

É basicamente uma cópia do "all-in-one demo" disponível em:

    https://www.webrtc-experiment.com/RTCMultiConnection/all-in-one.html

But WebRTC is much more than that!

Funcionalidades futuras
=======================

* Screensharing
* Colaborative canvas

Versões do Moodle
=================

O plugin foi testado no Moodle 2.7 e 2.8, se você testar em
outra versão do Moodle e funcionar (ou não funcionar),
por favor, deixe um comentário no link abaixo:

    https://github.com/danielneis/moodle-mod_webrtcexperiments/issues

Instalação
==========

* Coloque este código em "moodle/mod/webrtcexperiments"
* Visite o seu Moodle como administrador para instalar através da interface web

Servidor de sinalização
=======================

Este módulo precisa de um servidor de sinalização.
Para saber mais sobre Sinalização, por favor, visite:

    https://github.com/muaz-khan/WebRTC-Experiment/blob/master/Signaling.md

Se você não quer (ou não sente a necessidade, ou não pode, por qualquer motivo)
rodar seu próprio servidor de sinalização, não se preocupe.
Este módulo irá utilizar o servidor abaixo por padrão (sob TLS):

    wss://novoaeon.com.br:12034

Note que não há nenhuma garantia que este servidor esteja disponível.
Este servidor roda uma implementação de websockets em node.js disponível em:

    https://github.com/muaz-khan/WebRTC-Experiment/tree/master/websocket-over-nodejs

Contato
=======

Sinta-se a vontade para me enviar um email em danielneis@gmail.com .

Se você encontrar problemas ao usar o plugin ou gostaria de
ver alguma nova funcionalidade implementada, por favor, visite

    https://github.com/danielneis/moodle-mod_webrtcexperiments/issues

Se você gostou desse plugin e gostaria de dizer "olá" publicamente,
ao invés de me enviar um email, deixe um comentário em

    https://moodle.org/plugins/view.php?plugin=mod_webrtcexperiments

Doações
=========

[O desenvolvimento deste plugin não tem fins lucrativos. Se você gostar, você pode ajudá-lo a continuar assim doando através do paypal =)](https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=danielneis%40gmail%2ecom&lc=BR&no_note=0&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHostedGuest)
