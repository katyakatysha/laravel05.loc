@extends('layouts.admin')

@section('content')
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    @include('partials.header', ['name' => 'Products'])
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->

            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('products.store') }}" class="form-horizontal form-material mx-2" method="POST" enctype="multipart/form-data">
                            @csrf
                            @dump($errors->all())
                            <div class="form-group">
                                <label class="col-md-12">Product's Name</label>
                                <div class="col-md-12">
                                    <input name="name" type="text" class="form-control form-control-line" value={{ old('name') }}>
                                </div>
                                @if($errors->has('name'))
                                    @foreach($errors->get('name') as $error)
                                        {{ $error }}
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Product's Description</label>
                                <div class="col-md-12">
                                    <input name="description" type="text" class="form-control form-control-line" value = {{ old('description') }}>
                                </div>
                                @if($errors->has('description'))
                                    @foreach($errors->get('description') as $error)
                                        {{ $error }}
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Product's Category</label>
                                <select name="category_id" class="form-control">
                                    <option disabled>Выберите категорию</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Product's Price</label>
                                <div class="col-md-12">
                                    <input name="price" type="text" class="form-control form-control-line" value = {{ old('price') }}>
                                </div>
                                @if($errors->has('price'))
                                    @foreach($errors->get('price') as $error)
                                        {{ $error }}
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Product's Image</label>
                                <div class="col-md-12">
                                    <input name="image" type="file" class="form-control form-control-line" value = {{ old('image') }}>
                                </div>
                                @if($errors->has('image'))
                                    @foreach($errors->get('image') as $error)
                                        {{ $error }}
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <label class="col-md-12">Active</label>
                                <div class="col-md-12">
                                    <input name="active" type='checkbox' value="1">
                                </div>
                                @if($errors->has('active'))
                                    @foreach($errors->get('active') as $error)
                                        {{ $error }}
                                    @endforeach
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-success text-white">SAVE</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- footer -->
    <!-- ============================================================== -->
    <footer class="footer text-center">
        All Rights Reserved by Xtreme Admin. Designed and Developed by <a
            href="https://www.wrappixel.com">WrapPixel</a>.
    </footer>
    <!-- ============================================================== -->
    <!-- End footer -->
    <!-- ============================================================== -->
</div>
@endsection
