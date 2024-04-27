@extends('layouts.admin')
@section('content')
@include('bladecompunet')
    <div class="row">
        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">par week</span>
                        <h5 class="card-title mb-0">Last 7 dayes user</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                @if ($getusertoday==1)
                                <span style="color: #555; font-size:20px"><i class="fa-solid fa-user"></i></span>
                                    @else
                                    <span style="color: #555; font-size:20px"><i class="fa-solid fa-users"></i></span>
                                @endif
                                 
                                <span class="ms-4">{{ $getusertoday }}</span>
                            </h2>
                        </div>
                        <div class="col-4 text-end">
                            <span class="text-muted">{{ $users }} users <i
                                    class="mdi mdi-arrow-up text-success"></i></span>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $getusertoday }}%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div> <!-- end col-->

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">Per Week</span>
                        <h5 class="card-title mb-0">Last 7 dayes blog</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                                <span style="color: #555; font-size:20px"><i class="fa-brands fa-blogger-b"></i></span> <span class="ms-4">{{ $weekly_blog }}</span>
                            </h2>
                        </div>
                        <div class="col-4 text-end">
                            <span class="text-muted">{{ $blog_post }} blogs <i
                                    class="mdi mdi-arrow-down text-danger"></i></span>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: {{ $weekly_blog }}%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div><!-- end card-->
        </div>

        <div class="col-md-6 col-xl-4">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4">
                        <span class="badge badge-soft-primary float-end">Per Month</span>
                        <h5 class="card-title mb-0">Last 30 dayes Populer Blog</h5>
                    </div>
                    <div class="row d-flex align-items-center mb-4">
                        <div class="col-8">
                            <h2 class="d-flex align-items-center mb-0">
                               <span style="color: #555; font-size:20px"><i class="fa-solid fa-fire"></i></span> <span class="ms-4">{{ $month_populer }}</span>
                            </h2>
                        </div>
                        <div class="col-4 text-end">
                            <span class="text-muted">{{ $blog_post_populer }} populer<i
                                    class="mdi mdi-arrow-up text-success"></i></span>
                        </div>
                    </div>

                    <div class="progress shadow-sm" style="height: 5px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{ $month_populer }}%;">
                        </div>
                    </div>
                </div>
                <!--end card body-->
            </div>
            <!--end card-->
        </div> <!-- end col-->
    </div>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Top 5 Customers</h4>
                    <p class="card-subtitle mb-4 font-size-13">Transaction period from {{ carbon\carbon::now()->format('d M') }} to 30 days
                    </p>

                    <div>
                        <table class="table table-centered table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th style="width:400px">Comment</th>
                                    <th>Create Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ( $top_comments as $top_comment )
                                @if ($top_comment->status == 1)
                                    <tr class="bg-light">
                                        <td class="table-user">
                                            @if ($top_comment->rel_to_user->photo == null)
                                            <img src="{{ Avatar::create( $top_comment->rel_to_user->name )->toBase64() }}" width="24" class="author user_photo_comment" />
                                            @else 
                                                <img src="{{ asset('uploads/user') }}/{{ $top_comment->rel_to_user->photo }}" width="24" class="author user_photo_comment" alt=""> 
                                            @endif
                                            <a href="javascript:void(0);"
                                                class="text-body font-weight-semibold">{{ $top_comment->rel_to_user->name }}</a>
                                        </td>
                                        <td>
                                        {{ $top_comment->rel_to_user->email }}
                                        </td>
                                        <td class="text-wrap">
                                            @if ( strlen($top_comment->comment) > 80)
                                            <span style="cursor: pointer; color:rgba(26, 98, 207, 0.782)" data-bs-toggle="modal" data-bs-target="#editcommentModal{{ $top_comment->id }}">{{ Substr($top_comment->comment,0,80).' '.'...' }}<strong style="color:rgba(0, 0, 0, 0.592)">Read_more</strong></span>
                                            @else 
                                            {{ $top_comment->comment }}
                                            @endif
                                        </td>
                                        <td>
                                            {{ $top_comment->created_at->diffForHumans() }}
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('blog.single',$top_comment->blog_id) }}" data-status="{{ $top_comment->status }}" comment-id="{{ $top_comment->id }}" class="btn btn-info comment_btn">View Comment</a>
                                        </td>
                                    </tr>
                                   @else
                                   <tr class="">
                                    <td class="table-user">
                                        @if ($top_comment->rel_to_user->photo == null)
                                        <img src="{{ Avatar::create( $top_comment->rel_to_user->name )->toBase64() }}" width="24" class="author user_photo_comment" />
                                        @else 
                                            <img src="{{ asset('uploads/user') }}/{{ $top_comment->rel_to_user->photo }}" width="24" class="author user_photo_comment" alt=""> 
                                        @endif
                                        <a href="javascript:void(0);"
                                            class="text-body font-weight-semibold">{{ $top_comment->rel_to_user->name }}</a>
                                    </td>
                                    <td>
                                    {{ $top_comment->rel_to_user->email }}
                                    </td>
                                    <td class="text-wrap">
                                        @if ( strlen($top_comment->comment) > 80)
                                        <span style="cursor: pointer; color:rgba(26, 98, 207, 0.782)" data-bs-toggle="modal" data-bs-target="#editcommentModal{{ $top_comment->id }}">{{ Substr($top_comment->comment,0,80).' '.'...' }}<strong style="color:rgba(0, 0, 0, 0.592)">Read_more</strong></span>
                                        @else 
                                        {{ $top_comment->comment }}
                                        @endif
                                    </td>
                                    <td>
                                        {{ $top_comment->created_at->diffForHumans() }}
                                    </td>
                                    
                                    <td>
                                        <a href="{{ route('blog.single',$top_comment->blog_id) }}" data-status="{{ $top_comment->status }}" comment-id="{{ $top_comment->id }}" class="btn btn-info comment_btn">View Comment</a>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-3">
                        {{ $top_comments->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Blog</h4>
                    <p class="card-subtitle mb-4">Recent Stock</p>

                    <div class="text-center">
                        <input data-plugin="knob" data-width="165" data-height="165" data-linecap=round
                            data-fgColor="#7a08c2" value="{{ $blog_post }}" data-skin="tron" data-angleOffset="180"
                            data-readOnly=true data-thickness=".15" />
                        <h5 class="text-muted mt-3">Total Blog</h5>


                        <p class="text-muted w-75 mx-auto sp-line-2">Traditional heading
                            elements are
                            designed to work best in the meat of your page content.</p>

                        <div class="row mt-3">
                            <div class="col-6">
                                <p class="text-muted font-15 mb-1 text-truncate">Today</p>
                                <h4><i class="fas fa-arrow-up text-success me-1"></i>{{ $daily_blog }}</h4>

                            </div>
                            <div class="col-6">
                                <p class="text-muted font-15 mb-1 text-truncate">Last week</p>
                                <h4><i class="fas fa-arrow-down text-danger me-1"></i>{{ $weekly_blog }}</h4>
                            </div>

                        </div>
                    </div>
                </div> <!--end card body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
    {{-- Edit Category --}}
@foreach ( $top_comments as $sl=>$comment ) 
    <div class="modal fade" id="editcommentModal{{ $comment->id }}" tabindex="-1" aria-labelledby="editcommentLabel{{ $comment->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h1 class="modal-title fs-5 text-light" id="editcommentLabel{{ $comment->id }}"><i class="fa-solid fa-cloud"></i> View</h1>
              <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">
                {{ $comment->comment }}
            </div>
          </div>
        </div>
    </div>
@endforeach

@section('footer_script')
<script>
    $('.comment_btn').click(function(){
        let comment_id = $(this).attr('comment-id');
        let status = $(this).attr('data-status');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "POST",
            url: '/getcommentstatus',
            data: { 'comment_id':comment_id,'status':status },
            success: function( data ) {
            }
        });
    });
</script>
@endsection