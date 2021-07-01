@extends('layout.index')


@section('content')
    
<div class="card">
    <div class="card-header bg-transparent header-elements-inline">
        <h6 class="card-title">Invoice archive</h6>
        <div class="header-elements">
            <div class="list-icons">
                <a class="list-icons-item" data-action="collapse"></a>
                <a class="list-icons-item" data-action="reload"></a>
                <a class="list-icons-item" data-action="remove"></a>
            </div>
        </div>
    </div>

    <table class="table table-lg invoice-archive">
        <thead>
            <tr>
                <th>#</th>
                <th>Period</th>
                <th>Issued to</th>
                <th>Status</th>
                <th>Issue date</th>
                <th>Due date</th>
                <th>Amount</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>#0025</td>
                <td>February 2015</td>
                <td>
                    <h6 class="mb-0">
                        <a href="#">Rebecca Manes</a>
                        <span class="d-block font-size-sm text-muted">Payment method: Skrill</span>
                    </h6>
                </td>
                <td>
                    <select name="status" class="form-control form-control-select2" data-placeholder="Select status">
                        <option value="overdue">Overdue</option>
                        <option value="hold" selected>On hold</option>
                        <option value="pending">Pending</option>
                        <option value="paid">Paid</option>
                        <option value="invalid">Invalid</option>
                        <option value="cancel">Canceled</option>
                    </select>
                </td>
                <td>
                    April 18, 2015
                </td>
                <td>
                    <span class="badge badge-success">Paid on Mar 16, 2015</span>
                </td>
                <td>
                    <h6 class="mb-0 font-weight-bold">$17,890 <span class="d-block font-size-sm text-muted font-weight-normal">VAT $4,890</span></h6>
                </td>
                <td class="text-center">
                    <div class="list-icons list-icons-extended">
                        <a href="#" class="list-icons-item" data-toggle="modal" data-target="#invoice"><i class="icon-file-eye"></i></a>
                        <div class="list-icons-item dropdown">
                            <a href="#" class="list-icons-item dropdown-toggle" data-toggle="dropdown"><i class="icon-file-text2"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item"><i class="icon-file-download"></i> Download</a>
                                <a href="#" class="dropdown-item"><i class="icon-printer"></i> Print</a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item"><i class="icon-file-plus"></i> Edit</a>
                                <a href="#" class="dropdown-item"><i class="icon-cross2"></i> Remove</a>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection