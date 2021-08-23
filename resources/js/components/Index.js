import React, { useState, useEffect } from 'react';
import { Table, Navbar, Nav, Container, } from 'react-bootstrap';
import ReacthOM from 'react-dom';
import { Link, Route, BrowserRouter } from "react-router-dom";
import 'bootstrap/dist/css/bootstrap.min.css';
import item from './Item';
// import { Button } from "module";
function app() {
    return (
        <div className="App">
            <BrowserRouter>
                <Route path="/item">
                    <Protected Cmp={item} />
                </Route>
            </BrowserRouter>
        </div>
    )
}


function Example() {
    const [data, sethata] = useState([])
    useEffect(() => {
        gethata([]);
    }, [])

    async function gethata() {
        let result = await fetch("http://127.0.0.1:8000/api/post/");
        result = await result.json();
        sethata(result)
        // console.log(result)
    }
    return (
        <>
            <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-12 col-lg-12">
                        <div className="card">
                            <h3>Liste de tous les Posts</h3>
                            <Table className="table">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>title</th>
                                        <th>Sous-titre</th>
                                        {/* <th>Description</th> */}
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                {
                                    data.map((item, id) =>
                                        <tbody key={id}>
                                            <tr >
                                                <th>{item.id}</th>
                                                <th>{item.title}</th>
                                                <th>{item.subtitle}</th>
                                                {/* <th>{item.content}</th> */}
                                                <th><img src="img/tm-img-310x180-1.jpg" alt="Image" style={{ width: 100 }} className="tm-margin-b-20 img-fluid" /></th>
                                                <td>
                                                    <BrowserRouter>
                                                        {/* <Route path="/item"> */}
                                                        <Link to={"item/" + item.id}>
                                                            <span className="item">Détail</span>
                                                        </Link>
                                                        {/* </Route> */}
                                                    </BrowserRouter>
                                                </td>
                                            </tr>
                                        </tbody>
                                    )
                                }
                            </Table>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReacthOM.render(
        <div>
            <Example />
        </div>,
        document.getElementById('example'));
}