@extends('layouts.master')

@section('stylesheets')
  <link rel="stylesheet" href="{{ asset(App::environment('production') ? '/public/vendors/ckeditor/contents.css' : '/vendors/ckeditor/contents.css') }}">
  <style>
    td > h1, h2, h3, h4, h5, h6, p {
      margin-bottom: 0;
    }

    .c-breadcrumbs__wrapper {
      margin-top: 91px;
      z-index: -1
    }

    .navbar-nav {
      padding-right: 0;
    }

    main {
      margin-top: 145px;
    }
  </style>
@endsection

@section('content')
	<div class="c-breadcrumbs__wrapper fixed-top">
    <div class="container">
      <nav aria-label="breadcrumb" class="d-flex align-items-center">
        <ol class="breadcrumb mb-0">
          <li class="breadcrumb-item ">
            <a href="# ">Job Vacancy</a>
          </li>
          <li class="breadcrumb-item active " aria-current="page ">Job Vacancy Lists</li>
        </ol>
        <div class="action ml-auto p-2">
          <a class="btn btn-warning" data-toggle="modal" data-target="#add-job-vacancy" data-backdrop="static" id="btn-add-job-vacancy">
            <i class="fas fa-plus"></i>&nbsp; Add Job Vacancy</a>
        </div>
      </nav>
    </div>
  </div>

  <main class="container py-5 ">
    <h2 class="text-center ">Job Vacancy Lists</h2>
    <hr class="line ">
    <table id="tbl-job-vacancy" class="table table-hover">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Vacancy</th>
          <th>Description</th>
          <th>Urgent</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>

    <!-- Add Job Vacancy Modal -->
    <div class="modal fade" id="add-job-vacancy" tabindex="-1" role="dialog" aria-labelledby="addJobVacancyLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="frm-add-job-vacancy" name="frm_add_job_vacancy" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="addJobVacancyLabel">Add Job Vacancy</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="job-name">Job Name:</label>
                <input type="text" name="job_name" id="job-name" class="form-control" placeholder="e.g. Security Guard" autocomplete="off">
                <div class="valid-feedback">Help text</div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="no-of-vacancy">Number of Vacancy:</label>
                    <input type="number" name="no_of_vacancy" id="no-of-vacancy" class="form-control" placeholder="0" autocomplete="off">
                    <div class="valid-feedback">Help text</div>
                  </div>
                </div>
                <div class="col-8">
                  <div class="form-group">
                    <label for="job-image">Image:</label>
                    <input type="file" name="job_image" id="job-image" class="form-control" placeholder="0">
                    <div class="valid-feedback">Help text</div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="job_description" id="description-label">Description:</label>
                <textarea name="job_description" id="job_description" cols="30" rows="5" class="form-control" required autocomplete="off"></textarea>
                <div class="valid-feedback">Help text</div>
              </div>
              <div class="form-group">
                <label for="">Immediate Hiring?&nbsp; </label>
                <div class="form-check form-check-inline ml-3">
                  <input class="form-check-input" type="radio" name="hiring_status" id="hiring-status1" value="Yes">
                  <label class="form-check-label" for="hiring-status1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="hiring_status" id="hiring-status2" value="No">
                  <label class="form-check-label" for="hiring-status2">No</label>
                </div>
              </div>
              <div class="form-group">
                <label for="">Featured?&nbsp; </label>
                <div class="form-check form-check-inline ml-3">
                  <input class="form-check-input" type="radio" name="featured" id="featured1" value="Yes">
                  <label class="form-check-label" for="featured1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="featured" id="featured2" value="No">
                  <label class="form-check-label" for="featured2">No</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning" id="add-job-vacancy-btn">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Edit Job Vacancy Modal -->
    <div class="modal fade" id="edit-job-vacancy" tabindex="-1" role="dialog" aria-labelledby="editJobVacancyLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="frm-edit-job-vacancy" name="frm_edit_job_vacancy" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="editJobVacancyLabel">Edit Job Vacancy</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <input type="hidden" name="hdn_edit_job_id" id="hdn-edit-job-id">
                <label for="edit-job-name">Job Name:</label>
                <input type="text" name="edit_job_name" id="edit-job-name" class="form-control" placeholder="e.g. Security Guard" autocomplete="off">
                <div class="valid-feedback">Help text</div>
              </div>
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="edit-no-of-vacancy">Number of Vacancy:</label>
                    <input type="number" name="edit_no_of_vacancy" id="edit-no-of-vacancy" class="form-control" placeholder="0">
                    <div class="valid-feedback">Help text</div>
                  </div>
                </div>
                <div class="col-8">
                  <div class="form-group">
                    <label for="edit-job-image">Image:</label>
                    <input type="file" name="edit_job_image" id="edit-job-image" class="form-control" placeholder="0">
                    <div class="valid-feedback">Help text</div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label for="edit_job_description">Description:</label>
                <textarea name="edit_job_description" id="edit_job_description" cols="30" rows="5" class="form-control" placeholder="Description"></textarea>
                <div class="valid-feedback">Help text</div>
              </div>
              <div class="form-group">
                <label for="">Urgent Hiring?&nbsp; </label>
                <div class="form-check form-check-inline ml-3">
                  <input class="form-check-input" type="radio" name="edit_hiring_status" id="edit-hiring-status1" value="Yes">
                  <label class="form-check-label" for="edit-hiring-status1">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="edit_hiring_status" id="edit-hiring-status2" value="No">
                  <label class="form-check-label" for="edit-hiring-status2">No</label>
                </div>
              </div>
              <div class="form-group">
                <label for="">Featured?&nbsp; </label>
                <div class="form-check form-check-inline ml-3">
                  <input class="form-check-input" type="radio" name="edit_featured" id="edit-featured1" value="Yes">
                  <label class="form-check-label" for="">Yes</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="edit_featured" id="edit-featured2" value="No">
                  <label class="form-check-label" for="">No</label>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-warning" id="edit-job-vacancy-btn">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Delete Job Vacancy Modal -->
    <div class="modal fade" id="delete-job-vacancy" tabindex="-1" role="dialog" aria-labelledby="deleteJobVacancyLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="frm-delete-job-vacancy" name="frm_delete_job_vacancy" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-header">
              <h5 class="modal-title" id="deleteJobVacancyLabel">Delete Job Vacancy</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="d-flex align-items-center">
                <input type="hidden" name="hdn_delete_job_id" id="hdn-delete-job-id">
                <i class="fas fa-question-circle" style="font-size: 32px;"></i>
                <p class="mb-0 ml-2">Are you sure you want to delete <span class="font-weight-bold text-primary" id="job-name-show"></span> from the job vacancy list?</p>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-warning" id="delete-job-vacancy-btn">Yes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
@endsection

@section('scripts')
  <script src="{{ asset(App::environment('production') ? '/public/vendors/ckeditor/ckeditor.js' : '/vendors/ckeditor/ckeditor.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/vendors/ckeditor/config.js' : '/vendors/ckeditor/config.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/vendors/ckeditor/styles.js' : '/vendors/ckeditor/styles.js') }}"></script>
  <script src="{{ asset(App::environment('production') ? '/public/js/pages/job_vacancy.js' : '/js/pages/job_vacancy.js') }}"></script>
@endsection