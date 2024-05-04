<div id="ajax_responce_serarchDiv">
    @if (isset($sections) && count($sections) > 0)
    <table id="example2" class="table table-bordered table-hover">

    <thead>
        <tr>
            <th class="wd-15p border-bottom-0">#</th>
            <th class="wd-15p border-bottom-0">أسم القسم
            </th>
            <th class="wd-20p border-bottom-0">وصف القسم
            </th>
            <th class="wd-20p border-bottom-0">تاريخ الأضافة
            </th>
            <th class="wd-20p border-bottom-0">العمليات
            </th>
        </tr>
        </thead>


        <tbody>
        @foreach ($sections as $section)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a
                        href="{{ route('dashboard.sections.show', $section->id) }}">{{ $section->name }}</a>
                </td>
                <td>{{ Str::limit($section->description, 50) }}</td>
                <td>{{ $section->created_at->diffForHumans() }}</td>
                <td>
                    <a class="modal-effect btn btn-outline-info btn-sm" data-bs-toggle="modal"
                       href="#edit{{ $section->id }}"><i class="fas fa-edit"></i></a>

                    <a class="modal-effect btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                       href="#delete{{ $section->id }}"><i class="fas fa-trash-alt"></i></a>
                    @include('dashboard.sections.delete')
                </td>
            </tr>
            @include('dashboard.sections.edit')
        @endforeach
        </tbody>
    </table>
    {{-- {{ $sections->render('pagination::bootstrap-5') }} --}}
</div>

<div class="col-md-12" id="ajax_pagination_in_search">
    {{ $sections->links() }}
</div>
@else
    <div class="alert alert-danger">
        عفوا لاتوجد بيانات لعرضها !!
    </div>
@endif
