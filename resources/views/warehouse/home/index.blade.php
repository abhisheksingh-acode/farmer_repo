@extends('warehouse.layout.index')
@section('title', 'fcenter')
@section('content')

    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <h4>Inventory</h4>
            </div>
            <div class="col-12 row d-flex justify-content-around mb-2">
                <div class="drum col-11 mt-2 bg-white col-sm-5  py-3">
                    <div class="text-center">
                        <p class="m-0">Total number of drums</p>
                        <span>1235</span>
                    </div>
                </div>

                <!-- model start-->
                <div class="modal fade" id="exampleModalToggle" aria-hidden="true"
                    aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header" style="padding-left: 30px;">
                                <h5 class="modal-title" id="exampleModalLabel">Add Drums</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                    style="
                                                    float: right;    font-size: 10px;"></button>
                            </div>
                            <div class="modal-body" style="padding: 20px 30px;">
                                <form class="col-12">
                                    <div class="my-3 col-12">
                                        <input type="number" class="form-control" placeholder="No of Drums">
                                    </div>
                                    <div class="mb-3 col-12 ">
                                        <input type="text" class="form-control" placeholder="Source">
                                    </div>
                                    <div class="row mb-4 mx-0 px-0">
                                        <textarea placeholder="Comment" style="height: 80px;"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="container row">
                                <div class="mb-3 col-9">
                                    <a href="#"
                                        class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                        style="
                                                            padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                                </div>
                                <div class="mb-3 col-3">
                                    <a href="#"
                                        class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                        style="
                                                            float: right;padding: 5px 20px !important;
                                                            font-size: 15px !important;background: #0d6efd !important;
                                                            color: #fff !important; border-color: #0d6efd !important; ">Save</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- model end-->

                <div class="kg mt-2 col-11 bg-white col-sm-5 pt-3">
                    <div class="text-center">
                        <p class="m-0">Total stock in Kg</p>
                        <span>1235</span>
                    </div>
                </div>
            </div>

            <!-- model start-->
            <div class="modal fade" id="exampleModalToggles" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header" style="padding-left: 30px;">
                            <h5 class="modal-title" id="exampleModalLabel">Add Kg</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="
                                                    float: right;    font-size: 10px;"></button>
                        </div>
                        <div class="modal-body" style="padding: 20px 30px;">
                            <form class="col-12">
                                <div class="my-3 col-12">
                                    <input type="text" class="form-control" placeholder="Quantity">
                                </div>
                                <div class="mb-3 col-12 ">
                                    <input type="text" class="form-control" placeholder="Source">
                                </div>
                                <div class="row mb-4 mx-0 px-0">
                                    <textarea placeholder="Comment" style="height: 80px;"></textarea>
                                </div>
                            </form>
                        </div>
                        <div class="container row">
                            <div class="mb-3 col-9">
                                <a href="#"
                                    class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                    style="
                                                            padding: 5px 20px !important;font-size: 15px !important;float: right;background: #000 !important;color: #fff !important;">Cancel</a>
                            </div>
                            <div class="mb-3 col-3">
                                <a href="#"
                                    class="btn btn-primary allocate-permission rounded-pill px-3 px-sm-5 pt-0 fs-4 py-0 my-2"
                                    style="
                                                            float: right;padding: 5px 20px !important;
                                                            font-size: 15px !important;background: #0d6efd !important;
                                                            color: #fff !important; border-color: #0d6efd !important; ">Save</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- model end-->

            <div class="col-12 mx-auto xscroll">
                <table class="table bg-white custab mt-4 ">
                    <thead class="text-center">
                        <tr>
                            <th> ID</th>
                            <th>Added by</th>
                            <th>Quantity</th>
                            <th>Source</th>
                            <th>Date</th>
                            <th>Drum ID</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>1235644584</td>
                            <td>Farmer</td>
                            <td>98</td>
                            <td>abc, district, state, pin</td>
                            <td>dd/mm/yyyy</td>
                            <td>
                                <ul class="px-0 pe-2 m-0"
                                    style="overflow-y:scroll; height:60px; list-style:none; text-align:center;">
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                </ul>
                            </td>
                            <td>
                                <textarea class="form-control" id="exampleFormControlTextarea1" readonly></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>1235644584</td>
                            <td>Farmer</td>
                            <td>98</td>
                            <td>abc, district, state, pin</td>
                            <td>dd/mm/yyyy</td>
                            <td>
                                <ul class="px-0 pe-2 m-0"
                                    style="overflow-y:scroll; height:60px; list-style:none; text-align:center;">
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                </ul>
                            </td>
                            <td>
                                <textarea class="form-control" id="exampleFormControlTextarea1" readonly></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>1235644584</td>
                            <td>Farmer</td>
                            <td>98</td>
                            <td>abc, district, state, pin</td>
                            <td>dd/mm/yyyy</td>
                            <td>
                                <ul class="px-0 pe-2 m-0"
                                    style="overflow-y:scroll; height:60px; list-style:none; text-align:center;">
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                    <li>1355342</li>
                                </ul>
                            </td>
                            <td>
                                <textarea class="form-control" id="exampleFormControlTextarea1" readonly></textarea>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
