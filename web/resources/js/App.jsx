import React from 'react';
import { createRoot } from 'react-dom/client'
import ListItem from "./components/ListItem";
import TestListUseReducer from "./components/TestListUseReducer";

export default function App(){
    return(
        <div id="container-wrapper" className="pad-top-100 pad-bottom-100 parallax">
            <div className="container-fluid">
                <div className="row">
                    <TestListUseReducer />
                     
                </div>
                <div className="row">
                    <ListItem />
                     
                </div>
                {/* end row */}
                
            </div>
            {/* end container */}
        </div>
    );
}

if(document.getElementById('root')){
    createRoot(document.getElementById('root')).render(<App />)
}
