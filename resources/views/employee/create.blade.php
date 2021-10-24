<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
<h1>Create Employee</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<br />

    <form action="{{ route('employee.store') }}" method="post">
    
        @csrf

        <input type="number" name="company_id" placeholder="company_id"><br />
        <input type="text" name="username" placeholder="username"><br />
        <input type="email" name="email" placeholder="email"><br />
        <input type="text" name="name_ar" placeholder="name_ar"><br />
        <input type="text" name="name_en" placeholder="name_en"><br />
        <input type="text" name="marital" placeholder="marital" value="marital"><br />
        <input type="text" name="sex" placeholder="sex" value="sex"><br />
        <input type="number" name="identification_number" placeholder="identification_number"><br />
        <input type="number" name="job_number" placeholder="job_number"><br />
        <input type="text" name="job_title" placeholder="job_title"><br />
        <input type="date" name="contract_start_date" placeholder="contract_start_date"><br />
        <input type="number" name="vacations_balance" placeholder="vacations_balance"><br />
        <input type="number" name="basic_salary" placeholder="basic_salary"><br />
        <input type="password" name="password" placeholder="password"><br />
        <input type="password" name="password_confirmation" placeholder="password_confirmation"><br />

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</body>
</html>