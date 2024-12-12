
@extends('admin.master')
@section('body')
<div class="card">
    <div class="card-header">
        <h4>Danh sách liên hệ</h4>
        {{-- <a href="{{ route('contacts.index') }}" class="btn btn-primary mb-3">Thêm comment</a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Tin nhắn</th>
                        <th>Ngày gửi</th>
                        <th>Phản hồi</th>
                        <th>Ngày phản hồi</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td>{{ $contact->message }}</td>
                            <td>{{ $contact->created_at ? $contact->created_at->format('d/m/Y H:i') : '-' }}</td>
                            <td>{{ $contact->response ?? 'Chưa phản hồi' }}</td>
                            <td>{{ $contact->response_date ? \Carbon\Carbon::parse($contact->response_date)->format('d/m/Y H:i') : '-' }}</td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm btn-reply" data-id="{{ $contact->id }}" data-name="{{ $contact->name }}" data-email="{{ $contact->email }}">
                                    Phản hồi
                                </button>
                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $contact->id }}">
                                    Xóa
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                        
            </table>
        </div>
    </div>
</div>
{{-- <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="replyModalLabel">Phản hồi liên hệ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="replyForm" method="POST" action="{{ route('contacts.reply') }}">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="contact_id" id="contact_id">
                    <div class="mb-3">
                        <label for="contact_name" class="form-label">Tên khách hàng</label>
                        <input type="text" class="form-control" id="contact_name" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="response" class="form-label">Phản hồi</label>
                        <textarea name="response" id="response" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
<!-- Modal sửa phản hồi -->
{{-- <div class="modal fade" id="editResponseModal" tabindex="-1" aria-labelledby="editResponseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editResponseModalLabel">Sửa phản hồi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editResponseForm" method="POST" action="{{ route('contacts.editResponse') }}">
                @csrf
                <input type="hidden" name="contact_id" id="edit_contact_id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="edit_response" class="form-label">Phản hồi</label>
                        <textarea name="response" id="edit_response" class="form-control" rows="4" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </div>
            </form>
        </div>
    </div>
</div> --}}
@endsection
<script>
    document.querySelectorAll('.btn-reply').forEach(button => {
    button.addEventListener('click', function () {
        const id = this.getAttribute('data-id');
        const name = this.getAttribute('data-name');
        const email = this.getAttribute('data-email');

        document.getElementById('contact_id').value = id;
        document.getElementById('contact_name').value = name;

        const modal = new bootstrap.Modal(document.getElementById('replyModal'));
        modal.show();
    });
});
</script>
