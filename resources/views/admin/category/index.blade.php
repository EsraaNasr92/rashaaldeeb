@extends('layouts.app')

@section('content')

<h2 class="intro-y text-lg font-medium mt-10">Categories</h2>

@if(session('status'))
    <div class="alert alert-info" >
        {{ session('status') }}
    </div>
@endif

<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        
        <a class="btn btn-primary shadow-md mr-2" href="javascript:;" data-tw-toggle="modal" data-tw-target="#createCategoryModal">Add New Category</a>
        
        <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-slate-500">
                <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i> 
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->
    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report -mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">IMAGES</th>
                    <th class="whitespace-nowrap">CATEGORY NAME</th>
                    <th class="whitespace-nowrap">SLUG</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
                  <tr class="intro-x">
                      <td class="w-40">
                          <div class="flex">
                              <div class="w-10 h-10 image-fit zoom-in">
                                  <img alt="" class="tooltip rounded-full" src="{{ asset ('dist/images/preview-1.jpg') }}" title="Uploaded at 20 December 2022">
                              </div>
                          </div>
                      </td>
                      <td>
                          <a href="" class="font-medium whitespace-nowrap">{{ $category->name }}</a> 
                          @if ($category->children)
                          <table class="table table-report -mt-2">
                            <tbody>
                              @foreach ($category->children as $child)
                              <td> {{ $child->name }}</td>
                              <td>
                              <div class="flex justify-center items-center">
                                  <a 
                                    type="button" 
                                    href="javascript:;"
                                    class="flex items-center mr-3 edit-category" 
                                    data-tw-toggle="modal" 
                                    data-tw-target="#editCategoryModal"
                                    data-id="{{ $child->id }}" 
                                    data-name="{{ $child->name }}">
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                  <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal-child"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete</a>
                              </div>
                              </td>
                              @endforeach
                            </tbody>
                          </table>
                          @endif
                      </td>
                      <td>
                          <a class="text-slate-500 flex items-center mr-3" href="javascript:;"> <i data-lucide="external-link" class="w-4 h-4 mr-2"></i> /categories/home-appliance </a>
                      </td>

                      <td class="table-report__action w-56">
                          <div class="flex justify-center items-center">
                              <a 
                                type="button" 
                                href="javascript:;"
                                class="flex items-center mr-3 edit-category" 
                                data-tw-toggle="modal" 
                                data-tw-target="#editCategoryModal"
                                data-id="{{ $category->id }}" 
                                data-name="{{ $category->name }}"
                                >
                                <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                            </a>
                              <a class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"> <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                          </div>
                      </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END: Data List -->
    <!-- BEGIN: Pagination -->
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
        <nav class="w-full sm:w-auto sm:mr-auto">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-left"></i> </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-left"></i> </a>
                </li>
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevron-right"></i> </a>
                </li>
                <li class="page-item">
                    <a class="page-link" href="#"> <i class="w-4 h-4" data-lucide="chevrons-right"></i> </a>
                </li>
            </ul>
        </nav>
        <select class="w-20 form-select box mt-3 sm:mt-0">
            <option>10</option>
            <option>25</option>
            <option>35</option>
            <option>50</option>
        </select>
    </div>
    <!-- END: Pagination -->
</div>

@foreach ($categories as $category)   
                  <!-- BEGIN: Delete Confirmation Modal -->
                  <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-body p-0">
                                  <div class="p-5 text-center">
                                      <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                                      <div class="text-3xl mt-5">Are you sure?</div>
                                      <div class="text-slate-500 mt-2">
                                          Do you really want to delete these records? 
                                          <br>
                                          This process cannot be undone.
                                      </div>
                                  </div>
                                  <div class="px-5 pb-8 text-center">
                                
                                    <form action="{{ route('pcategory.destroy', $category->id) }}" method="POST">
                                      @csrf
                                      @method('DELETE')
                                      <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                      <button type="submit" class="btn btn-danger w-24">Delete</button>
                                    </form>
                                  
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- END: Delete Confirmation Modal -->


              @if ($category->children)
                @foreach ($category->children as $child)
                  <!-- BEGIN: Delete Child Confirmation Modal -->
                  <div id="delete-confirmation-modal-child" class="modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="p-5 text-center">
                                        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
                                        <div class="text-3xl mt-5">Are you sure?</div>
                                        <div class="text-slate-500 mt-2">
                                            Do you really want to delete these records? 
                                            <br>
                                            This process cannot be undone.
                                        </div>
                                    </div>
                                    <div class="px-5 pb-8 text-center">
                                  
                                  
                                      <form action="{{ route('pcategory.destroy', $child->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                        <button type="submit" class="btn btn-danger w-24">Delete</button>
                                      </form>
                                  
                                  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END: Delete Child Confirmation Modal -->
                  @endforeach
                @endif

                @endforeach



<!-- BEGIN: Create Confirmation Modal -->
<div class="modal" tabindex="-1" role="dialog" id="createCategoryModal" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
  <div class="modal-body p-0">
    <div class="p-5 text-center">
        <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i> 
        <div class="text-3xl mt-5">Edit Category</div>
        <div class="text-slate-500 mt-2">
            <form action="{{ route('category.store') }}" method="POST">
              @csrf

              <div class="form-group">
                <select class="form-control" name="parent_id">
                  <option value="">Select Parent Category</option>

                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <input type="text" name="name" class="form-control mt-4" value="{{ old('name') }}" placeholder="Category Name" required>
              </div>

              <div class="px-5 pb-8 text-center">
                  <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1 mt-4">Cancel</button>
                  <button type="submit" class="btn btn-primary w-24 mt-4">Create</button>
              </div>
            </form>
        </div>
    </div>

  </div>
</div>
</div>

<!-- END: Create Confirmation Modal -->

<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session('status'))
                <div class="alert alert-info" >
                    {{ session('status') }}
                </div>
            @endif

            <div class="container py-3">

              <div class="modal" tabindex="-1" role="dialog" id="editCategoryModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Edit Category</h5>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="" method="POST">
                      @csrf
                      @method('PUT')

                      <div class="modal-body">
                        <div class="form-group">
                          <input type="text" name="name" class="form-control" value="" placeholder="Category Name" required>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                    </div>
                    </form>
                </div>
              </div>

              <div class="row">
              <div class="col-md-8">

                <div class="card">
                  <div class="card-header">
                    <h3>Categories</h3>
                  </div>
                  <div class="card-body">
                    <ul class="list-group">
                      @foreach ($categories as $category)
                        <li class="list-group-item">
                          <div class="d-flex justify-content-between">
                            {{ $category->name }}

                            <div class="button-group d-flex">
                              <button 
                                      type="button" 
                                      class="btn btn-sm btn-primary mr-1 edit-category" 
                                      data-toggle="modal" 
                                      data-target="#editCategoryModal" 
                                      data-id="{{ $category->id }}" 
                                      data-name="{{ $category->name }}">
                                      Edit
                              </button>

                              <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                              </form>
                            </div>
                          </div>

                          @if ($category->children)
                            <ul class="list-group mt-2">
                              @foreach ($category->children as $child)
                                <li class="list-group-item">
                                  <div class="d-flex justify-content-between">
                                    {{ $child->name }}

                                    <div class="button-group d-flex">
                                      <button type="button" class="btn btn-sm btn-primary mr-1 edit-category" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $child->id }}" data-name="{{ $child->name }}">Edit</button>

                                      <form action="{{ route('category.destroy', $child->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                      </form>
                                    </div>
                                  </div>
                                </li>
                              @endforeach
                            </ul>
                          @endif
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h3>Create Category</h3>
                  </div>

                  <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                      @csrf

                      <div class="form-group">
                        <select class="form-control" name="parent_id">
                          <option value="">Select Parent Category</option>

                          @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                      </div>

                      <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Category Name" required>
                      </div>

                      <div class="form-group">
                        <button type="submit" class="btn btn-primary">Create</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              </div>
              </div>




        </div>
    </div>
</div>-->
@endsection


@section('scripts')
    @include('admin.category.partials.scripts')
@endsection
