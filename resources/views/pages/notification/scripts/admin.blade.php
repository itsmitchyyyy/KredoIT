<script>
        $(function(){
            // members
            $.ajax({
                url: "{{ route('borrowed.total') }}",
                success: function(response) {
                    $('#memberCount').text(response);
                }
            });
            // end
            // items
            $.ajax({
                url: "{{ route('borrowed.total.items') }}",
                success: function(response) {
                    $('#itemCount').text(response);
                }
            });
            // end
            // request
            $.ajax({
                url: "{{ route('borrowed.total.request') }}",
                success: function(response) {
                    $('#requestCount').text(response);
                }
            });
            // end
            // notifications
            $.ajax({
                url: "{{ route('notification.all') }}"
            }).then(function(result){
                $('#noticationList').empty();
                var data = '';
                result.map(function(res){
                    if(res.user != null) {
                    data += `<div class="d-flex flex-row mt-1">                            
                            <div class="notification-list-icon">
                                <i class="fa fa-envelope-open"></i>
                            </div>
                            <div class="d-flex flex-column w-100">
                                <h3>Title</h3>
                                <span>`+res.user.employee.employee_fname+` `+res.user.employee.employee_lname+` `+res.description+`</span>
                                <small>`+moment(res.created_at).format('MMMM DD, YYYY')+`</small>
                            </div>
                            </div>`;
                        }
                });
                $('#noticationList').append(data);
            });
        });
    </script>