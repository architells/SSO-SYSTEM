@extends('SSO.layouts.header')

@section('content')
<div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6 d-flex justify-content-end align-items-center">
                    <form class="d-flex justify-content-end align-items-center gap-3 mb-3">
                        <div class="form-group">
                            <select name="semester" class="form-select rounded border-gray-300">
                                <option value="">Select Semester</option>
                                <option value="1st Semester">1st Semester</option>
                                <option value="2nd Semester">2nd Semester</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="course" class="form-select rounded border-gray-300">
                                <option value="">Select Course</option>
                                <option value="BSIT">BSIT</option>
                                <option value="BSCS">BSCS</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="year" class="form-select rounded border-gray-300">
                                <option value="">Select Year</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="table_search" class="form-control rounded border-gray-300" style="width: 200px;" placeholder="Search">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" style="height: calc(1.5em + .5rem + 2px); padding: .3rem .5rem;">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>




    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mt-3">
                    <div class="card">
                        <!-- Card Body -->
                        <div class="card-body table-responsive p-0" style="height: calc(100vh - 250px);">
                            <table class="table table-striped table-bordered text-nowrap">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Reason</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                        <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
                                    </tr>
                                    <!-- More rows as needed -->
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
@endsection