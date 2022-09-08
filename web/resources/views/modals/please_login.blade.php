    <div id="modal-content" class="rounded-2xl">
        <div class="flex flex-col text-center py-12">
            <p class="text-left mb-10 text-center text-3xl text-base">
                備品詳細を閲覧したい場合はログインしてください
            </p>
            <div class="mt-10 items-center">
                <a href="{{ route('login') }}"
                    class=" PButton-primary w-1/2 mx-auto py-2 md:w-3/5 font-xs shadow text-white capitalize transition-colors duration-200 bg-blue rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    ログインページへ
                </a>
            </div>
        </div>
    </div>
    {{-- <script>
      $(function() {
          //モーダルウィンドウを出現させるクリックイベント
          $("#modal-open").click(function() {
              //キーボード操作などにより、オーバーレイが多重起動するのを防止する
              $(this).blur(); //ボタンからフォーカスを外す
              if ($("#modal-overlay")[0]) return false; //新しくモーダルウィンドウを起動しない (防止策1)
              //if($("#modal-overlay")[0]) $("#modal-overlay").remove() ;     //現在のモーダルウィンドウを削除して新しく起動する (防止策2)

              //オーバーレイを出現させる
              $("body").append('<div id="modal-overlay"></div>');
              $("#modal-overlay").fadeIn("slow");

              //コンテンツをセンタリングする
              centeringModalSyncer();

              //コンテンツをフェードインする
              $("#modal-content").fadeIn("slow");

              //[#modal-overlay]、または[#modal-close]をクリックしたら…
              $("#modal-overlay,#modal-close").unbind().click(function() {

                  //[#modal-content]と[#modal-overlay]をフェードアウトした後に…
                  $("#modal-content,#modal-overlay").fadeOut("slow", function() {

                      //[#modal-overlay]を削除する
                      $('#modal-overlay').remove();

                  });

              });

          });

          $("#call-start-modal").click(function() {

              //キーボード操作などにより、オーバーレイが多重起動するのを防止する
              $(this).blur(); //ボタンからフォーカスを外す
              if ($("#modal-overlay")[0]) return false; //新しくモーダルウィンドウを起動しない (防止策1)
              //if($("#modal-overlay")[0]) $("#modal-overlay").remove() ;     //現在のモーダルウィンドウを削除して新しく起動する (防止策2)

              //オーバーレイを出現させる
              $("body").append('<div id="modal-overlay"></div>');
              $("#modal-overlay").fadeIn("slow");

              //コンテンツをセンタリングする
              centeringModalSyncer();

              //コンテンツをフェードインする
              $("#modal-content").fadeIn("slow");

              //[#modal-overlay]、または[#modal-close]をクリックしたら…
              $("#modal-overlay,#modal-close").unbind().click(function() {

                  //[#modal-content]と[#modal-overlay]をフェードアウトした後に…
                  $("#modal-content,#modal-overlay").fadeOut("slow", function() {

                      //[#modal-overlay]を削除する
                      $('#modal-overlay').remove();

                  });

              });

          });


          //リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
          $(window).resize(centeringModalSyncer);

          //センタリングを実行する関数
          function centeringModalSyncer() {

              //画面(ウィンドウ)の幅、高さを取得
              var w = $(window).width();
              var h = $(window).height();

              // コンテンツ(#modal-content)の幅、高さを取得
              // jQueryのバージョンによっては、引数[{margin:true}]を指定した時、不具合を起こします。
              //      var cw = $( "#modal-content" ).outerWidth( {margin:true} );
              //      var ch = $( "#modal-content" ).outerHeight( {margin:true} );
              var cw = $("#modal-content").outerWidth();
              var ch = $("#modal-content").outerHeight();

              //センタリングを実行する
              $("#modal-content").css({
                  "left": ((w - cw) / 2) + "px",
                  "top": ((h - ch) / 2) + "px"
              });
          }
      });
  </script> --}}

  <style>
      #modal-content {
          width: 50%;
          margin: 0;
          padding: 80px 0;
          background: #fff;
          position: fixed;
          display: none;
          z-index: 2;
      }

      #modal-overlay {
          z-index: 1;
          display: none;
          position: fixed;
          top: 0;
          left: 0;
          width: 100%;
          height: 120%;
          background-color: rgba(0, 0, 0, 0.5);
      }

      .button-link {
          color: #00f;
          text-decoration: underline;
      }

      .button-link:hover {
          cursor: pointer;
          color: #f00;
      }

  </style>
