@extends('admin.layout.layout')
@section('title', 'contact')
@section('content')
    <div class=" main-content flex-wrap flex-md-nowrap p-4 ">
        <div class=" mx-5">
            <div class="col-12 uppercol mt-5">
                <p>Lead <span>/ Contact</span></p>
                <div class="d-flex justify-content-between">
                    <h4> Contact</h4>
                </div>
            </div>

            <!--filter start -->
            <div class="accordion accordion-flush mt-5" id="accordionFlushExample">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Filter
                        </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="col-12 mb-2">
                                <form class="row">
                                    <div class="col-md-3 col-12 my-3">
                                        <input type="date" class="form-control">
                                    </div>
                                </form>

                            </div>
                            <div class="col-md-3 col-8 my-md-3 mx-auto">
                                <button type="submit" class="btn btn-primary col-12 mb-3">Filter</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--filter end -->



            <div class="col-12 mx-auto">
                <table class="table bg-white custab mt-5">
                    <thead class="text-center">
                        <tr>
                            <th>Unique ID</th>
                            <th>Name</th>
                            <th>Phone no.</th>
                            <th>Email ID</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>Mark</td>
                            <td>9886864864</td>
                            <td>mark@mdo</td>
                            <td>Your message here</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Drak</td>
                            <td>9886864864</td>
                            <td>mark@mdo</td>
                            <td>Your message here</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sam</td>
                            <td>9886864864</td>
                            <td>mark@mdo</td>
                            <td>Your message here</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Sam</td>
                            <td>9886864864</td>
                            <td>mark@mdo</td>
                            <td>Your message here</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Sam</td>
                            <td>9886864864</td>
                            <td>mark@mdo</td>
                            <td>Your message here</td>
                            <td>dd/mm/yyyy</td>
                            <td class="action "><i class="fas fa-trash delete-icon text-danger"></i></td>
                        </tr>
                    </tbody>
                </table>
            </div>




        </div>


    </div>
    </div>
@endsection
