@include('layouts.header')
@include('layouts.nav')

<main id="main" class="main">

<div class="pagetitle">
  <h1>{{$page}}</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
      <li class="breadcrumb-item">Pages</li>
      <li class="breadcrumb-item active">{{$page}}</li>
    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
        <h5 class="card-title">
            {{$page}}
            <a href="{{url('/schools/add')}}">
            <button class="btn btn-primary float-end btn-sm">
                <i class="bi bi-plus"></i>
                Add New
            </button>
            </a>
        </h5>

        <!-- message -->
        @include("layouts.includes.messages")

    <div class="table-responsive">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">School</th>
            <th scope="col">Created By</th>
            <th scope="col">Date</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @if(isset($rows) && $rows)
          @foreach($rows as $key => $row)
          <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$row->school}}</td>
            <td>{{ucfirst($row->user->firstname)}} {{ucfirst($row->user->lastname)}}</td>
            <td>{{date("jS M, Y",strtotime($row->created_at))}}</td>
            <td>
                <a href="{{url('schools/switch/'.$row->id)}}">
                <button class="btn btn-primary float-end me-1 btn-sm">
                    <i class="ri ri-arrow-go-back-fill me-1"></i>
                    Switch To
                </button>
                </a>

                <a href="{{url('/schools/delete/'.$row->id)}}">
                <button class="btn btn-danger float-end me-1  btn-sm">
                    <i class="ri ri-delete-bin-6-fill"></i>
                </button>
                </a>
                
                <a href="{{url('/schools/edit/'.$row->id)}}">
                <button class="btn btn-info float-end me-1  btn-sm">
                    <i class="ri ri-edit-2-fill"></i>
                </button>
                </a>

            </td>
          </tr>
          @endforeach
          @endif
        </tbody>
    </table>
    </div>
        
        </div>
      </div>

    </div>
  </div>
</section>

</main>

@include('layouts.footer')