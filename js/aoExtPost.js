function aoExtPost(extPostUrl) {
//generate iframe via some echoed out javascript
var aoUrl = extPostUrl;
var aoUrlStr = aoUrlA.toString();
var aoIfrm = document.createElement('iframe');
aoIfrm.setAttribute('id', 'ifrm');
aoIfrm.style.display='none';
aoIfrm.style.width='0px';
aoIfrm.style.height='0px';
aoIfrm.src = aoUrlStr;
document.body.appendChild(aoIfrm);
};