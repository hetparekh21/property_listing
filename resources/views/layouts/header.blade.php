<html>

<head>
    <link rel="stylesheet" href="../main.css">
    <script src="../main.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="../jquery.js"></script> --}}
    <script src="../popper.js"></script>
    {{-- <link rel="stylesheet" href="boxicons.css"> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <!-- or -->
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

    {{-- <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"> --}}
    {{-- <link rel="stylesheet" href="assets/css/styles.min.css"> --}}

    <style>
        * {
            margin: 0px;
            padding: 0px;
            /* border: 1px solid  black; */
        }

        :root {
            --font-inter: 'Inter', sans-serif;
            --font-Josefin: 'Josefin Sans', sans-serif;
            --font-stack-body: 'Kalam', cursive;
        }

        /* navbar start */
        #navbar {
            /* background-color: rgb(240, 240, 240); */
            border-bottom: 1px solid grey;
            height: 80px;
            margin: 0px 5px;
        }

        #navsec2 {
            font-family: var(--font-Josefin);
        }

        #spannav {
            padding: 7px 10px 5px 10px;
            font-size: .5rem;
            width: 150px;
            /* background-color: lightgrey; */
            cursor: pointer;
        }

        #spannav2 {
            padding: 7px 10px 5px 10px;
            font-size: .5rem;
            width: 40px;
            border-top-right-radius: 0.375rem;
            border-bottom-right-radius: 0.375rem;
            border: 1px solid transparent;
        }

        #brandp {
            margin-left: 8px;
            margin-bottom: 0px;
            margin-top: 3px;
        }

        #brandp::after {
            content: 'Brand';
            display: block;
            font-size: .5rem;
            margin-top: -7px;
        }

        #spannav2 img {
            width: 20px;
            height: 20px;
        }

        #spannav::before {
            content: " ";
            position: absolute;
            margin-left: 120px;
            margin-top: -7px;
            border: solid black;
            border-width: 0 1.5px 1.5px 0;
            padding: 2.5px;
            transform: rotate(45deg);
            transition: all .2s;
        }

        #spannav:hover::before {
            transform: rotate(225deg);
            margin-top: -1px;
        }

        #inputnav {
            width: 500px;
            border: 1px solid transparent;
            outline: none;
            padding: 2px 10px;
        }

        #navsec2 {
            margin-top: 2px;
        }

        #navsec3 {
            /* padding: 3px 10px 5px 10px; */
            height: 40px;
            font-size: .5rem;
            width: 140px;
            background-color: transparent;
            border-radius: 5px;
            border: 1px solid transparent;
        }

        #sec3img1 {
            width: 20px;
            height: 20px;
            margin-left: 10px;
            cursor: pointer;
        }

        #navsec3 p {
            margin-bottom: 0px;
            font-weight: 600;
        }

        #sec3img2 {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            object-fit: cover;
        }

        /* navbar end */
        /* body part 1 start */
        #body1 {
            height: 500px;
            width: 1920;
            margin: 0px 5px;
            margin-top: 10px;
            background-color: rgb(242, 242, 242);
            border-radius: 10px;
        }

        #body1 #part1 {
            height: 150px;
            background: url("https://wallpaperaccess.com/full/3632150.jpg");
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            /* background-repeat: no-repeat;
        width: 100%; */
        }

        #tagdiv {
            margin-left: 100px;
            font-size: 1.1pc;
        }

        #tagdiv p {
            border: 1px solid white;
            border-radius: 50px;
            padding: 3px 10px 5px 10px;
            background-color: rgb(0, 0, 0, .000001);
            transition: all .2s;
            cursor: pointer;
        }

        #tagdiv p:hover {
            background-color: rgb(0, 0, 0, .05);
        }



        #part2 {
            height: 350px;
        }

        #part2prt1 {
            height: 104px;
            width: 20%;
            border: 1px solid ba;
        }

        #part2title {
            border: 1px solid black;
            width: 190px;
            padding: 4px 10px 6px 10px;
            font-weight: 600;
        }

        #part2prt2 {}

        #ct1 {
            content: " ";
            margin-top: 0px;
            cursor: pointer;
            border: solid black;
            border-width: 0 1.5px 1.5px 0;
            padding: 2.5px;
            transform: rotate(45deg);
            transition: all .2s;
        }

        #firstctg1 {
            border: 1px solid black;
            width: 170px;
            padding: 4px 10px 6px 10px;
            font-weight: 600;
        }

        #firstctg2 {
            border: 1px solid black;
            width: 100px;
            padding: 4px 10px 6px 10px;
            font-weight: 600;
        }

        #ctname {
            margin-bottom: 0px;
            margin-top: 3px;
        }

        /* body 2 */
        #body2 {
            height: 600px;
            width: 1920;
            margin: 0px 5px;
            margin-top: 15px;
            background-color: rgb(242, 242, 242);
            border-radius: 10px;
        }

        #body2 #part1 {
            height: 150px;
            background: url("https://images.pexels.com/photos/15170049/pexels-photo-15170049.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2");
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
    </style>

</head>

<body style="background-color: #F6F6F6" class="">
    <form class="form-inline" action="{{ route('index') }}" method="Post">
        @csrf
        <div class="container-fluid" id="navbarsec" style="padding: 0px">
            <nav class="navbar navbar-light d-flex flex-row justify-content-between" id="navbar">

                <div class="container-fluid">

                    <a class="navbar-brand d-flex flex-row" href="#">
                        <img src="https://images.pexels.com/photos/3763188/pexels-photo-3763188.jpeg?auto=compress&cs=tinysrgb&w=600"
                            alt="" width="50" height="50" style="border-radius: 50%; object-fit: cover"
                            class="d-inline-block align-text-top" />
                        <p id="brandp">Brand</p>
                    </a>

                    <div class="" id="navsec2">

                        <div class="input-group">
                            <select class="input-group-text border-1 border-success" name="category" id="category">
                                <option value="0" selected_category>All Categories</option>
                                @foreach ($categories as $data)
                                    @if ($selected_category == $data['category_id'])
                                        <option value="{{ $data['category_id'] }}" selected>
                                            {{ $data['category_name'] }}
                                        </option>
                                    @else
                                        <option value="{{ $data['category_id'] }}">{{ $data['category_name'] }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            <input class="form-control border-success" type="text" name="query"
                                value="{{ $query }}" id="query"
                                placeholder="Search for a Product, brand ..." />
                            <button class="btn btn-outline-success border-1 border-success" id="spannav2"
                                type="submit"><img
                                    src="https://cdn3.iconfinder.com/data/icons/social-media-2125/80/search-128.png"
                                    alt="" /></button>

                            <a href="{{ route('clear') }}" class="btn btn-outline-dark ml-2">Clear Search</a>
                        </div>

                    </div>

                    <div>
                        @if (Auth::check())
                            <a href="{{ route('admin.logout') }}" class="btn btn-success">Logout</a>
                        @endif
                    </div>

                </div>
            </nav>
        </div>

    </form>
