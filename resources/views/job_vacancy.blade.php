@extends('layouts.hr_master')

@section('stylesheets')
@endsection

@section('content')
	<div class="c-breadcrumbs__wrapper">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-flex align-items-center">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item ">
            <a href="# ">Job Vacancy</a>
          </li>
          <li class="breadcrumb-item active " aria-current="page ">Job Vacancy Lists</li>
        </ol>
        <div class="action ml-auto p-2">
          <a class="btn btn-warning" type="button" data-toggle="modal" data-target="#add-job-vacancy" data-backdrop="static">
            <i class="fas fa-plus"></i>&nbsp; Add Job Vacancy</a>
        </div>
      </nav>
    </div>
  </div>

  <main class="container py-5 ">
    <h2 class="text-center ">Job Vacancy Lists</h2>
    <hr class="line ">
    <table id="tbl-job-vacancy" class="table table-hover ">
      <thead>
        <th>#</th>
        <th>Name</th>
        <th>Vacancy</th>
        <th>Description</th>
        <th>Action</th>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Security Guard</td>
          <td>10</td>
          <td>Lorem ipsum asdasdasasas...</td>
          <td>
            <button class="btn btn-info" title="Edit Job Vacancy" data-toggle="modal" data-target="#edit-job-vacancy" data-backdrop="static">
              <i class="fas fa-edit "></i>
            </button>
            <button class="btn btn-info" title="Delete Job Vacancy" data-toggle="modal" data-target="#delete-job-vacancy">
              <i class="fas fa-trash "></i>
            </button>
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Add Job Vacancy Modal -->
    <div class="modal fade" id="add-job-vacancy" tabindex="-1" role="dialog" aria-labelledby="addJobVacancyLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addJobVacancyLabel">Add Job Vacancy</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Job Name:</label>
              <input type="text" name="" id="" class="form-control" placeholder="Security Guard">
              <div class="valid-feedback">Help text</div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Number of Vacancy:</label>
                  <input type="number" name="" id="" class="form-control" placeholder="0">
                  <div class="valid-feedback">Help text</div>
                </div>
              </div>
              <div class="col-8">
                <div class="form-group">
                  <label for="">Image:</label>
                  <input type="file" name="" id="" class="form-control" placeholder="0">
                  <div class="valid-feedback">Help text</div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Description:</label>
              <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
              <div class="valid-feedback">Help text</div>
            </div>
            <div class="form-group">
              <label for="">Immediate Hiring?&nbsp; </label>
              <div class="form-check form-check-inline ml-3">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Yes" checked>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="No">
                <label class="form-check-label" for="inlineRadio2">No</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning">Save</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Edit Job Vacancy Modal -->
    <div class="modal fade" id="edit-job-vacancy" tabindex="-1" role="dialog" aria-labelledby="editJobVacancyLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editJobVacancyLabel">Edit Job Vacancy</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="">Job Name:</label>
              <input type="text" name="" id="" class="form-control" placeholder="Security Guard">
              <div class="valid-feedback">Help text</div>
            </div>
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Number of Vacancy:</label>
                  <input type="number" name="" id="" class="form-control" placeholder="0">
                  <div class="valid-feedback">Help text</div>
                </div>
              </div>
              <div class="col-8">
                <div class="form-group">
                  <label for="">Image:</label>
                  <input type="file" name="" id="" class="form-control" placeholder="0">
                  <div class="valid-feedback">Help text</div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="">Description:</label>
              <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
              <div class="valid-feedback">Help text</div>
            </div>
            <div class="form-group">
              <label for="">Immediate Hiring?&nbsp; </label>
              <div class="form-check form-check-inline ml-3">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Yes" checked>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="No">
                <label class="form-check-label" for="inlineRadio2">No</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-warning">Update</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Delete Job Vacancy Modal -->
    <div class="modal fade" id="delete-job-vacancy" tabindex="-1" role="dialog" aria-labelledby="deleteJobVacancyLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="deleteJobVacancyLabel">Delete Job Vacancy</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="d-flex align-items-center">
              <i class="fas fa-question-circle" style="font-size: 32px;"></i>
              <p class="mb-0 ml-2">Are you sure you want to delete this?</p>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            <button type="button" class="btn btn-warning">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script>
    $(document).ready(function () {
      $('#tbl-job-vacancy').dataTable();
    });
  </script>
@endsection