<?php namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Flash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Queue;
use Illuminate\Support\Facades\Request;
use Redirect;

class TicketController extends Controller
{
    /**
     * create new ticket for Guest user
     * @return \Illuminate\View\View
     */
    public function getContactUs()
    {
        return View('panel.tickets.contact_us');
    }

    /**
     * store a new ticketReply for GuestUser
     * @param CreateGuestTicketRequest $request
     * @return mixed
     */
    public function postGuestCreate(Request $request)
    {
        $input = $request->all();
        dd($input);

        $input['priority'] = intval($input['priority']);
        $input['ticket_department_id'] = intval($input['ticket_department_id']);
        $input['user_id'] = -1;
        $input['ip'] = $request->ip();
        $ticket = Ticket::guestNewTicket($input, true);
        Flash::success(trans('ticket.ticketReplySuccess'));

        return Redirect::route('home.guestTicket.getReply', [
            base64_encode($input['email']), base64_encode($ticket->public_id)
        ]);
    }

    /**
     * create TicketReply for guestUser
     * @param $email
     * @param $publicId
     * @return \Illuminate\View\View
     */
    public function getGuestReply($email, $publicId)
    {
        $email = base64_decode($email);
        $publicId = base64_decode($publicId);
        $findTicket = Ticket::where('public_id', intval($publicId))->first();
        if (empty($findTicket) || $findTicket->guest['email'] != $email) {
            Flash::error(trans('ticket.wrongEmailOrTicket'));

            return Redirect::route('home.guestTicket.getSearch');
        }
        $findTicket->read_status = 1;
        $findTicket->save();

        return View('panel.tickets.Guest_ticket_reply')->with(compact('findTicket', 'email', 'publicId'));
    }

    /**
     * store TicketReply for guestUser
     * @param CreateGuestTicketReplyRequest $request
     * @return mixed
     */
    public function postGuestReply(CreateGuestTicketReplyRequest $request, $email, $publicId)
    {
        $input = $request->only(['content']);
        $email = base64_decode($email);
        $publicId = base64_decode($publicId);
        $findTicket = Ticket::where('public_id', intval($publicId))->first();
        if (empty($findTicket) || $findTicket->guest['email'] != $email) {
            Flash::error(trans('ticket.wrongEmailOrTicket'));

            return Redirect::route('home.guestTicket.getSearch');
        }
        $input['ip'] = $request->ip();
        $input['ticket_id'] = new \MongoId($findTicket->_id);
        $input['user_id'] = -1;
        $input['read_status'] = ['first' => true];
        $input['status'] = 1;
        $input['ticket_department_id'] = $findTicket['ticket_department_id'];
        $input['priority'] = $findTicket['priority'];

        $input['attachment'] = Ticket::saveAttachment($request, $findTicket);
        TicketReply::newReply($input);
        Flash::success(trans('ticket.ticketReplySuccess'));

        return Redirect::route('home.guestTicket.getReply', [
            base64_encode($email), base64_encode($publicId)
        ]);
    }

    /**
     * close GuestTicket
     * @param null $ticketId
     * @return mixed
     */
    public function postGuestClose($ticketId = null)
    {
        $ticket = Ticket::findOrFail($ticketId);
        if (empty($ticket)) {
            Flash::error('The Wrong Ticket id');
            return Redirect::route('panel.ticket.getIndex');
        }
        if ($ticket->status < 3) {
            $ticket->update(['status' => 3]);
        }
        $input['content'] = trans('ticket.closeReply');
        $input['ip'] = Request::ip();
        $input['ticket_id'] = new \MongoId($ticket->_id);
        $input['user_id'] = -1;
        TicketReply::replyCloseTicket($input);
        Flash::success(trans('ticket.ticketCloseSuccess'));

        return Redirect::route('home.guestTicket.getSearch');
    }

    /**
     * search ticket of GuestUser
     * @return \Illuminate\View\View
     */
    public function getSearch()
    {
        return View('panel.tickets.search_guest_ticket');
    }

    /**
     * find ticket GuestUser
     * @return mixed
     */
    public function postFind()
    {
        $input = Request::all();

        return Redirect::route('home.guestTicket.getReply', [
            base64_encode($input['email']),
            base64_encode($input['ticket_id'])
        ]);
    }

    public function getFindTicket($ticketId)
    {
        $ticket = Ticket::where('public_id', intval($ticketId))
            ->first();
        $ticketReply = $ticket->TicketReplies()
            ->latest('created_at')
            ->first();
        $token = Queue::push('App\Jobs\Ticket\Notify', ['reply_id' => $ticketReply->_id], null, true);
        dd($token);
    }

    public function getFindTransaction($transactionId)
    {
        $transaction = Transaction::where('public_id', intval($transactionId))
            ->first();
        $token = Queue::push('App\Jobs\Transaction\Notify', ['transaction_id' => (string)$transaction->_id], null,
            true);
        dd($token);
    }

}
