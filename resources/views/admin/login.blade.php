<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+NKo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <title>Login Page</title>

    <style>
        * {
            margin: 0px;
            padding: 0px;
        }

        #mainlogin {
            background-color: rgb(244, 244, 244);
            height: 500px;
            width: 800px;
            padding: 0px;
            margin: 0px;
        }

        #firstdiv {
            /* border: 1px solid black; */
            /* height: 500px; */
            padding: 0px;
            margin: 0px;
            font-family: 'Noto Sans NKo', sans-serif;
        }

        #seconddiv {
            /* border: 1px solid black; */
            /* height: 500px; */
            padding: 0px;
            margin: 0px;
        }

        #inputbars {
            font-family: 'Josefin Sans', sans-serif;
        }

        #inputs {
            border: .2px solid grey;
            border-radius: 4px;
            outline: none;
            padding: 2px 5px;
            width: 250px;
            font-size: .8rem;
            margin-left: 5px;
            transition: all .4s;
        }

        /* #inputs:hover {} */
    </style>

</head>
<section class="d-flex justify-content-center align-items-center" style="height: 587px;">
    <div class="container row" id="mainlogin">
        <div class="w-50 h-100 d-flex justify-content-center align-items-center flex-column gap-0" id="firstdiv">
            <h3 style="margin: 0px;">Welcome Back</h3>
            <p class="" style="font-size: .8rem;">Welcome Back! Please enter your details</p>
            {{-- <div class="form-control">



                <form action="{{ route('admin.login') }}" class="form" method="post">

                    <label style="margin: 0px;font-size:.8rem;">Enter Registred Mail ID</p>
                    <input type="text" id="inputs" name="email" placeholder="email...">

                    <label style="margin: 0px;font-size:.8rem;">Password</p>
                    <input type="password" name="password" id="inputs" placeholder="password...">
                    
                    <button class="btn btn-dark" type="submit"
                        style="border-radius: 3px;font-size: .7rem;font-family: 'Inter', sans-serif;margin-top: 2px;">Log
                        In</button>

                </form>

            </div> --}}
            <form action="{{ route('admin.login') }}" class="form" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email..."
                        aria-describedby="helpId">
                </div>
                @error('email')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password"
                        placeholder="password...">
                </div>
                @error('password')
                    <span class="text-danger">{{$message}}</span>
                @enderror

                <button type="submit" class="btn btn-dark">Submit</button>

            </form>

        </div>
        <div class="w-50 h-100 " id="seconddiv">
            <img class="h-100 w-100"
                src="https://images.pexels.com/photos/2166559/pexels-photo-2166559.jpeg? 
            auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                alt="not found">
        </div>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
