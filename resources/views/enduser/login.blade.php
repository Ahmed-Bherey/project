<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>kayan | login </title>
    <link rel="shortcut icon" href="{{ asset('public/admin/dist/img/kayan.png') }}" type="image/x-icon">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Theme style -->
    {{-- custom theme --}}
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/bootstrap.css') }}">
    {{-- custom theme --}}
    <link rel="stylesheet" href="{{ asset('public/admin/dist/css/custom.css') }}">
</head>

<body class="hold-transition login-page">


    <div class="login-box">

    </div>
    <!-- /.login-box -->

    <div class="container mt-5">
        <div class="row login">
            <main class="col-12 col-sm-12 col-md-6 signup-container">
                <h1 class="heading-primary"> Login

                </h1>
                <p class="text-mute">Enter your credentials to access your account.</p>
                <div class="login-wrapper">
                    <div class="line-breaker">
                        <span class="line"></span>
                        <span class="line"></span>
                    </div>
                </div>
                @include('admin.layouts.alerts.success')
                @include('admin.layouts.alerts.errors')
                <form action="{{ route('login') }}" method="post" class="signup-form">
                    @csrf
                    <label class="inp">
                        <input type="email" class="input-text" placeholder="&nbsp;" name="email">
                        <span class="label">e-mail</span>
                        <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                    </label>
                    <label class="inp mt-4">
                        <input type="password" class="input-text" placeholder="&nbsp;" id="password"
                            name="password">
                        <span class="label">Password</span>
                        <span class="input-icon input-icon-password" data-password><i
                                class="fa-solid fa-eye"></i></span>
                    </label>
                    <button class="btn btn-login " type="submit">login</button>
                </form>
                {{-- <p class="text-mute"> <a href="$">هل نسيت كلمة المرور؟</a></p> --}}
            </main>
            <div class="col-12 col-sm-12 col-md-6 welcome-container">
                {{-- <h1 class="heading-secondary">مرحبا بك في <span class="lg">kayan!</span></h1> --}}
                <img src="{{ asset('public/admin/dist/img/kayan.png') }}" alt="kayan" title="kayan"
                    class="w-100">
            </div>
        </div>
    </div>
    <script>
        const eyeClick = document.querySelector("[data-password]");
        const password_elem = document.getElementById("password");

        eyeClick.onclick = () => {
            const icon = eyeClick.children[0];
            icon.classList.toggle("fa-eye-slash");
            if (password_elem.type === "password") {
                password_elem.type = "text";
            } else if (password_elem.type === "text") {
                password_elem.type = "password";
            }
        };
    </script>

</body>

</html>
