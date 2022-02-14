@extends('layouts.dashboard')

@section('statistic_content')

    <div class="card  p-5 shadow p-3 mb-5 bg-white rounded">
        <div class="card-title">
            <h2 class="create_staff_form text-bold">All Messages</h2>
            <hr class="create_staff_form">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-light">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date & Time</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <tr>
                        <td><a href="">1</a></td>
                        <td>Password Rest</td>
                        <td>Dear Tolgahan Dayanıklı, you can reset your password using the reset password 612423.</td>
                        <td>2022-02-04 22:13:23</td>
                    </tr>
            </table>
        </div>
        <!-- /.card-body -->
    </div>



@endsection
