<!DOCTYPE html>
   <html lang=en>
      <head>
          <meta charset=utf-8>
          <meta name=viewport content="user-scalable=1,initial-scale=1,minimum-scale=1">
          <title>file-upload-with-preview | Promosis</title><link rel="shortcut icon" href=./favicon.png>
          <meta name=robots content=index,follow>
          <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700" rel=stylesheet>
          <link href="{{ asset('preview/main.34b59dda2bc5f58aff5d.css') }}" rel=stylesheet>
    </head>
    <body>
        <div role=banner>
            <a href=https://github.com/promosis/file-upload-with-preview target=_blank class=github-corner aria-label="View source on Github"><svg width=80 height=80 viewBox="0 0 250 250" style="fill:#3157B3; color:#fff; position: absolute; top: 0; border: 0; right: 0;" aria-hidden=true><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill=currentColor style="transform-origin: 130px 106px;" class=octo-arm></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill=currentColor class=octo-body></path></svg></a>
            <style>.github-corner:hover .octo-arm{animation:octocat-wave 560ms ease-in-out}@keyframes octocat-wave{0%,100%{transform:rotate(0)}20%,60%{transform:rotate(-25deg)}40%,80%{transform:rotate(10deg)}}@media (max-width:500px){.github-corner:hover .octo-arm{animation:none}.github-corner .octo-arm{animation:octocat-wave 560ms ease-in-out}}</style>
            <div class=header-container>
                <a href=https://promosis.com><img src=./logo-promosis.png class=header-container__header-image alt=Promosis></a>
                <h1 class=header-container__header-content>file-upload-with-preview</h1>
                <div class=header-container__code><pre>npm i file-upload-with-preview</pre>
                </div><a href=https://github.com/promosis/file-upload-with-preview target=_blank class=header-container__link>View the source code on GitHub</a>
            </div>
        </div>
        <div class=demo-upload-container role=main>
            <div class=custom-file-container data-upload-id=myFirstImage>
                <label>Upload (Single File) <a href=javascript:void(0) class=custom-file-container__image-clear title="Clear Image">&times;</a></label> 
                <label class=custom-file-container__custom-file>
                    <input type=file class=custom-file-container__custom-file__custom-file-input id=customFile accept=image/* aria-label="Choose File"> 
                    <input type=hidden name=MAX_FILE_SIZE value=10485760> <span class=custom-file-container__custom-file__custom-file-control></span>
                </label><div class=custom-file-container__image-preview></div>
            </div>
          
            <div class=custom-file-container data-upload-id=mySecondImage><label>Upload (Allow Multiple) <a href=javascript:void(0) class=custom-file-container__image-clear title="Clear Image">&times;</a></label>
                 <label class=custom-file-container__custom-file>
                     <input type=file class=custom-file-container__custom-file__custom-file-input accept=* multiple=multiple aria-label="Choose File"> 
                    <input type=hidden name=MAX_FILE_SIZE value=10485760> <span class=custom-file-container__custom-file__custom-file-control></span>
                </label>
                <div class=custom-file-container__image-preview></div>
            </div></div><div class=demo-info-container role=contentinfo><div><a href=javascript:void(0) class="upload-info-button upload-info-button--first">Get first file info</a> <a href=javascript:void(0) class="upload-info-button upload-info-button--second">Get second file-group info</a> <span>Output will be in the console.</span>
            </div>
        </div><script src=https://cdn.jsdelivr.net/npm/es6-promise@4/dist/es6-promise.auto.js></script>
        <script src=https://cdnjs.cloudflare.com/ajax/libs/fetch/2.0.3/fetch.js></script>
        <script type=text/javascript src="{{ asset('preview/vendor.fb499262a9e09dc42cef.js') }}"></script>
        <script type=text/javascript src="{{ asset('preview/main.546310cb9577066438f3.js') }}"></script>
    </body></html>