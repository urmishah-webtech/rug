<div>
    <x-admin-layout>
        <div wire:key="alert" :id="1">
                @if (session()->has('message'))
                <div class="alert alert-success">
                   {{ session('message') }}
                </div>
                @endif
            </div>
        <section class="full-width flex-wrap admin-body-width">
            <article class="full-width">
                <div class="columns customers-details-heading">
                    <h4 class="mb-0 fw-5">Users and permissions</h4>
                </div>
            </article>
        </section>
        <section class="full-width flex-wrap admin-body-width sec-border">
            <article class="full-width">
                <div class="columns ten">
                    <div class="card card-pd-0">
                        <div class="card-header title-pb-0">
                            <h3 class="fw-6 fs-16 d-flex align-item-center justify-content-space-between lh-normal mb-0">Store owner</h3>
                        </div>
                        <div class="card-middle bd_none lh-normal">
                            <div class="d-flex align-center">
                                <div class="card-img">
                                    <img src="{{ asset('/assets/images/avatar.png') }}">
                                </div>
                                <div class="ssd-local-delivery-tittle">
                                    <h3 class="fs-14 fw-6 mb-0 lh-normal blue-color">Demo EStore</h3>
                                    <p class="text-grey mb-0">Last login was Wednesday, 22 December, 2021 6:35 pm IST</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-middle card-grey-bg">
                            <p class="mb-0">Store owners have some permissions that can't be assigned to staff. Learn more about <a class="arrow-with-link" href="#">store owner permissions<svg viewBox="0 0 20 20" class="Polaris-Icon__Svg_375hu" focusable="false" aria-hidden="true"><path d="M14 13v1a1 1 0 0 1-1 1H6c-.575 0-1-.484-1-1V7a1 1 0 0 1 1-1h1c1.037 0 1.04 1.5 0 1.5-.178.005-.353 0-.5 0v6h6V13c0-1 1.5-1 1.5 0zm-3.75-7.25A.75.75 0 0 1 11 5h4v4a.75.75 0 0 1-1.5 0V7.56l-3.22 3.22a.75.75 0 1 1-1.06-1.06l3.22-3.22H11a.75.75 0 0 1-.75-.75z"></path></svg></a></a></p>
                        </div>
                    </div>
                    <div class="card card-pd-0">
                        <div class="card-header title-pb-0">
                            <h3 class="fw-6 fs-16 d-flex align-item-center justify-content-space-between lh-normal mb-0">Staff ({{($users->currentPage()-1) * $users->perPage()+(count($users) ? 1:0)}} - {{($users->currentPage()-1)*$users->perPage()+count($users)}} of {{count($Customerget)}}) <a class="fs-14 fw-4" href="{{ route('create-role') }}">Add staff</a></h3>
                        </div>
                        <div class="card-middle bd_none card-pd-0 staff-card">
                            @foreach($users as $user)
                           <?php  $firstStringCharacter = substr($user->first_name, 0, 1); ?>
                            <div class="ssd-local-delivery">
                                <div class="staff-img">
                                    {{$firstStringCharacter}}
                                </div>
                                <div class="ssd-local-delivery-tittle">
                                    <a class="fs-14 fw-4 mb-0 lh-normal" href="{{route('updaterolepermission', $user->id) }}">{{$user->first_name}} {{$user->last_name}}</a>
                                    <p class="mb-0">Invitation sent</p>
                                </div>
                                <p class="mb-0 ml-auto">Limited permissions</p>
                            </div>
                            @endforeach

                            
                        </div>
                        {{ $users->links() }}
                    </div>
                </div>
            </article>
        </section>
    </x-admin-layout>
</div>
