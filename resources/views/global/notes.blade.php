<div class="form-group row">
    <div class="col-md-6">
        <label>Notes</label>
        <div class="notes well">
            <div class="clear"></div>
            @php
            preg_match_all("/{(.*?)}/", str_replace("\n", "<br>", $ticket->notes), $notes);
            @endphp
            @if(!empty($notes[1]))
            @foreach($notes[1] as $note)
                @php
                preg_match_all("/\[(.*?)\]/", $note, $n);
                @endphp
            @if($n[1][0] == Auth::user()->name)
            <span class="leadcomments bg-primary text-white text-right">
                <button class="btn btn-default btn-xs commentoptions float-right" type="button" data-toggle="dropdown">...</button>
                <ul class="dropdown-menu dropdown-menu-right commentoptionsdd">
                    <li class="dropdown-header">Options</li>
                    <li>
                    <a tabindex="-1" href="javascript:void(0)" class="deleteleadcomment">Delete</a>
                    </li>
                </ul>
                <b class="float-right-clear">{!! $n[1][0] !!}</b>
                <small class ="float-right-clear" aria-hidden="true" data-toggle="tooltip" data-placement="left" data-original-title="<?php echo date('M d, Y',strtotime($n[1][2]))." | ".date('h:i A',strtotime($n[1][2]))?>"><i class="fa fa-clock-o"> </i> <?php echo date('M d, Y',strtotime($n[1][2]))." | ".date('h:i A',strtotime($n[1][2]))?></small>
            @else
            <span class="leadcomments bg-danger text-white text-left">
                <button class="btn btn-default btn-xs commentoptions float-left" type="button" data-toggle="dropdown">...</button>
                <ul class="dropdown-menu dropdown-menu-right commentoptionsdd">
                    <li class="dropdown-header">Options</li>
                    <li>
                    <a tabindex="-1" href="javascript:void(0)" class="deleteleadcomment">Delete</a>
                    </li>
                </ul>
                <b class="float-left-clear">{!! $n[1][0] !!}</b>
                <small class ="float-left-clear" aria-hidden="true" data-toggle="tooltip" data-placement="left" data-original-title="<?php echo date('M d, Y',strtotime($n[1][2]))." | ".date('h:i A',strtotime($n[1][2]))?>"><i class="fa fa-clock-o"> </i> <?php echo date('M d, Y',strtotime($n[1][2]))." | ".date('h:i A',strtotime($n[1][2]))?></small>
            @endif
                <div class="clear"></div>
                <p><?php echo $n[1][1]; ?></p>
                <?php $comment = '{['.$n[1][0].']['.$n[1][1].']['.$n[1][2].']}';
                $comment = str_replace(array("\r","\n"),'',$comment);
                $comment = str_replace('"','&quot;',$comment);
                $comment = trim($comment);
                $editcommentcont = str_replace("<br>", "&space;", $n[1][1]);
                $editcommentcont = str_replace('"','&quot;', $editcommentcont);
                $editcommentcont = str_replace(array("\r","\n"),'',$editcommentcont);
                ?>
                <input type="hidden" class="deleteleadcomment2" data-content="<?php echo $comment?>" data-slug="{{ $ticket->slug }}">
            </span>
            
            @endforeach
            @else
                <b class="float-left"><?php echo ""; ?></b>
                <div class="clear"></div>
                <p>{{ $ticket->notes }}</p>
                <hr class="notes-sep">
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <label>Add Notes</label>
        <textarea cols="40" rows="10" class="form-control modal-input" id="leadnote" name="note" placeholder="Enter notes..."></textarea>
    </div>
</div>