import React, { useState, useEffect, useRef } from "react";
import { StreamChat } from 'stream-chat';
import './Chat.css';
import axios from 'axios';
const Chat = () => {
    return (
        <div className="row">
            <div className="container">
                <div className="row chat-window col-xs-5 col-md-3 p-0" id="chat_window_1">
                    <div className="col-xs-12 col-md-12 p-0">
                        <div className="panel panel-default">
                            <div className="panel-heading top-bar">
                                <div className="col-md-12 col-xs-12">
                                    <h3 className="panel-title"><span className="glyphicon glyphicon-comment"></span> Client Chat</h3>
                                </div>
                            </div>
                            <div className="panel-body msg_container_base">
                                <br/>

                                <div className="panel-footer">
                                    <div className="input-group">
                                        <input id="btn-input" type="text" className="form-control input-sm chat_input" placeholder="Write your message here..."  />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
export default Chat;