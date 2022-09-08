    <div id="modal-content" class="rounded-2xl">
        <div class="flex flex-col text-center py-12">
            <p class="text-left mb-10 text-center text-3xl text-base">
                備品詳細を閲覧したい場合はログインしてください。
            </p>
            <div class="mt-10 items-center">
                <a href="{{ route('login') }}"
                    class=" PButton-primary w-1/2 mx-auto py-2 md:w-3/5 font-xs shadow text-white capitalize transition-colors duration-200 bg-blue rounded-md hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    ログインページへ
                </a>
            </div>
        </div>
    </div>

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
