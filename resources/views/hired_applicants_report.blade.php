<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <main class="container py-5 ">
    <h2 class="text-center ">Hired Applicants</h2>
    <hr class="line">
    <table border="1">
      <tbody>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Job</th>
          <th>Contact</th>
          <th>Age</th>
          <th>Gender</th>
        </tr>
        @foreach($data as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>
              {{ $row->first_name }} {{ $row->middle_name }} {{ $row->last_name }}
            </td>
            <td>{{ $row->jobVacancies->name }}</td>
            <td>{{ $row->mobile }}</td>
            <td>{{ $row->age }}</td>
            <td>{{ $row->gender }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </main>
</body>
</html>
  
