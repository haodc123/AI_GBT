import React from 'react';
import { useRef, useReducer } from "react";

export default function TestListUseReducer() {

    const initState = {
        job: '',
        jobs: []
    }
    // Action
    const SET_JOB = 'set_job'
    const ADD_JOB = 'add_job'
    const DEL_JOB = 'del_job'
    const setJob = payload => {
        return {
            type: SET_JOB,
            payload
        }
    }
    const addJob = payload => {
        return {
            type: ADD_JOB,
            payload
        }
    }
    const delJob = payload => {
        return {
            type: DEL_JOB,
            payload
        }
    }

    const reducer = (state, action) => {
        switch (action.type) {
            case SET_JOB:
                return {
                    ...state,
                    job: action.payload
                }
                break;
            case ADD_JOB:
                return {
                    ...state,
                    jobs: [...state.jobs, action.payload]
                }
                break;
            case DEL_JOB:
                const newJobs = [...state.jobs]
                newJobs.splice(action.payload, 1);
                return {
                    ...state,
                    jobs: newJobs
                }
                break;
            default:
                throw new Error('Invalid action');
        }
    }

    const [state, dispatch] = useReducer(reducer, initState);

    const { job, jobs } = state; // ES6 destructuring

    const handleAddJob = () => {
        dispatch(addJob(job));
        dispatch(setJob(''));
        inputRef.current.focus();
    }

    const inputRef = useRef()

    return (
        <div className="row">
            <input 
                ref={inputRef}
                value={job}
                placeholder="Todo..." 
                onChange={e => {
                        dispatch(setJob(e.target.value))
                    }
                }
            />
            <button onClick={handleAddJob}>Add</button>
            <ul>
                {jobs.map((job, index) => (
                    <li key={index}>{job}
                        <span onClick={() => {
                            dispatch(delJob((index)))
                        }}>&times;</span>
                    </li>
                ))}
            </ul>
        </div>
        
    );
}
