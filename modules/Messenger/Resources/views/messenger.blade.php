<!-- Settings tab content -->
<div class="tab-pane" id="control-sidebar-messenger-tab">
    <template id="chats">
        <h3 class="control-sidebar-heading"><i class="fa fa-comment"></i>  Messenger</h3>
        <ul class="control-sidebar-menu">
            <template v-for="(index,item) in items">
                <chat-item v-bind:item="item" v-bind:index="index"></chat-item>
            </template>
        </ul>
        <chat v-ref:chat v-bind:item="chat"></chat>
    </template>

    <template id="chat-item">
        <li id="chat-item-!!id!!" class="chat-item">
            <a v-on:click="loadChat">
                <img v-bind:src="imageUrl" class="menu-icon" style="background-color: white"/>

                <div class="menu-info">
                    <h4 class="control-sidebar-subheading">!! item['participant.firstname'] !! !! item['participant.lastname'] !!</h4>
                    <template v-if="item.unread_messages">
                        <span data-toggle="tooltip"
                              style="position: absolute;left: 37px;"
                              title=""
                              class="badge bg-light-blue"
                              data-original-title="!! item.unread_messages !! New Messages">
                            !! item.unread_messages !!
                        </span>
                    </template>
                    <p>Online</p>
                </div>
            </a>
        </li>
    </template>

    <template id="chat-message">
        <template v-if="user()">
            <!-- Message. Default to the left -->
            <div class="direct-chat-msg">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">!! item['author.firstname'] !!  !! item['author.lastname'] !!</span>
                    <span class="direct-chat-timestamp pull-right">!! item.sent !!</span>
                </div>
                <!-- /.direct-chat-info -->
                <img class="direct-chat-img" v-bind:src="imageUrl" alt="Message User Image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    !! item.message !!
                </div>
                <!-- /.direct-chat-text -->
            </div>
            <!-- /.direct-chat-msg -->
        </template>
        <template v-else>
            <!-- Message to the right -->
            <div class="direct-chat-msg right">
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right">!! item['author.firstname'] !!  !! item['author.lastname'] !!</span>
                    <span class="direct-chat-timestamp pull-left">!! item.sent !!</span>
                </div>
                <!-- /.direct-chat-info -->
                <img class="direct-chat-img" v-bind:src="imageUrl" alt="Message User Image">
                <!-- /.direct-chat-img -->
                <div class="direct-chat-text">
                    !! item.message !!
                </div>
                <!-- /.direct-chat-text -->
            </div>
        </template>
    </template>

    <template id="chat">
        <template v-if="item">
            <div class="box box-primary direct-chat direct-chat-primary" style="position: fixed; bottom: -19px;;right: 230px;max-width: 320px;">
                <div class="box-header with-border">
                    <h3 class="box-title">!! item['participant.firstname'] !! !! item['participant.lastname']
                        !! </h3>

                    <div class="box-tools pull-right">
                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts"
                                data-widget="chat-pane-toggle">
                            <i class="fa fa-comments"></i></button>
                        <button type="button" class="btn btn-box-tool" v-on:click="dismiss"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages">
                        <template v-for="(index, messageItem) in item.messages">
                            <chat-message v-bind:item="messageItem" v-bind:index="index"></chat-message>
                        </template>
                        <!-- /.direct-chat-msg -->
                    </div>
                    <!--/.direct-chat-messages-->

                    <!-- Contacts are loaded here -->
                    {{--<div class="direct-chat-contacts">--}}
                        {{--<ul class="contacts-list">--}}
                            {{--<li>--}}
                                {{--<a href="#">--}}
                                    {{--<img class="contacts-list-img" src="../dist/img/user1-128x128.jpg" alt="User Image">--}}

                                    {{--<div class="contacts-list-info">--}}
                            {{--<span class="contacts-list-name">--}}
                              {{--Count Dracula--}}
                              {{--<small class="contacts-list-date pull-right">2/28/2015</small>--}}
                            {{--</span>--}}
                                        {{--<span class="contacts-list-msg">How have you been? I was...</span>--}}
                                    {{--</div>--}}
                                    {{--<!-- /.contacts-list-info -->--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<!-- End Contact Item -->--}}
                        {{--</ul>--}}
                        {{--<!-- /.contatcts-list -->--}}
                    {{--</div>--}}
                    <!-- /.direct-chat-pane -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <form action="#" method="post" @submit.prevent>
                        <div class="input-group">
                            <input type="text" v-model="message" autocomplete="off" @keyup.enter.prevent.stop="sendMessage" name="message" placeholder="Type Message ..." class="form-control">
                            <span class="input-group-btn">
                                <a v-on:click="sendMessage" class="btn btn-primary btn-flat">Send</a>
                            </span>
                        </div>
                    </form>
                </div>
                <!-- /.box-footer-->
            </div>
        </template>
        <template v-else>

        </template>
    </template>

    <chats v-bind:items="chats" v-bind:chat="chat"></chats>
</div>
<!-- /.tab-pane -->

<style type="text/css">
    .chat-item {
        cursor: pointer;
    }

    .direct-chat-text {
        overflow-wrap: break-word;
    }
</style>