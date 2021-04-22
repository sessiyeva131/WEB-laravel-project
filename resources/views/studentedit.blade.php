<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Students</title>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-accusoft"> SDU</span></h2>
        </div>

        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="{{url('dashboard')}}" class="active"><span class="las la-igloo"></span><span> Dashboard</span></a>
                </li>
                <li>
                    <a href="{{url('students')}}"><span class="las la-users"></span><span> Students</span></a>
                </li>
                <li>
                    <a href="{{url('grades')}}"><span class="las la-clipboard-list"></span><span> Grades</span></a>
                </li>
                <li>
                    <a href="{{url('attendance')}}"><span class="las la-user-check"></span><span> Attendance</span></a>
                </li>
                <li>
                    <a href="{{url('messages')}}"><span class="las la-envelope"></span><span> Messages</span></a>
                </li>
                <li>
                    <a href="{{url('changeLang')}}"><span class="las la-language"></span><span> EN</span></a>
                </li>
                <li>
                    <a href="{{url('welcome')}}"><span class="las la-user-circle"></span><span> Sign out</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label>

                Dashboard
            </h2>

            <!-- <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here"> 
            </div> -->

            <div class="user-wrapper">
                <div>
                <h4>{{session('email')}}</h4>
                <small>admin</small>
                </div>
            </div>
        </header>

        <main>
        @foreach($students as $s)
            <form action="{{ url('/students/update/'.$s->id) }}" method="post">
            @csrf
                <div class="mb-3">
                    <label name="student_id" class="form-label">Student ID: </label>
                    <input value="{{$s->student_id}}" type="text" name="student_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Name: </label>
                    <input value="{{$s->name}}" type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">Surname: </label>
                    <input value="{{$s->surname}}" type="text" name="surname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">Email: </label>
                    <input value="{{$s->email}}" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">Course: </label>
                    <input value="{{$s->course}}" type="text" name="course" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1"  class="form-label">Image: </label>
                    <img src="{{ asset('uploads/' . $s->image) }}" alt="Image" width="100" height="100">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                @endforeach
        </main>
    </div>
</body>
</html>