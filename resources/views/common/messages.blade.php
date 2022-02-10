@extends('authority.dashboard')

@section('statistic_content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title text-bold">Agents List</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-hover table-bordered text-center">
                <thead>
                    <tr class="table-light">
                        <th>SMS ID</th>
                        <th>SMS Title</th>
                        <th>SMS Description</th>
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
