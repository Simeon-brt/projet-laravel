<!DOCTYPE html>
<html>
<head>
    <title>@lang('Tasks List')</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>@lang('Tasks List')</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>@lang('Title')</th>
                <th>@lang('Created at')</th>
                <th>@lang('Updated at')</th>
                <th>@lang('State')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->title }}</td>
                    <td>{{ $task->created_at }}</td>
                    <td>{{ $task->updated_at }}</td>
                    <td>@if($task->state) {{ __('Done') }} @else {{ __('To do') }} @endif</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
