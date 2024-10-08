

document.addEventListener('turbo:load', loadPollData)

function loadPollData () {
    $('#pollsLanguage').select2({
        language: {
            noResults: function (params) {
                return Lang.get('messages.no_results_found');
            }
        },
        width: '100%',
    })
        listen('click', '.delete-poll-btn', function (event) {
            let pollTableName = $('#PollsTable')
            let deletePollId = $(event.currentTarget).data('id')
            deleteItem(route('polls.destroy', deletePollId), Lang.get('messages.poll.poll'))
        });
}
