import { Injectable } from '@angular/core';
import {HttpClient} from "@angular/common/http"
import {Observable} from "rxjs";
import {Nota} from "./nota";

@Injectable({
  providedIn: 'root'
})
export class ServicioNotaService {

  url="http://localhost/";
  constructor(private http:HttpClient) { }

  consultarNotas():Observable<any>{
    return this.http.get(`${this.url}inicio.php`);
  }

  guardarDatos(lista:Array<Nota>):Observable<any>{
    return this.http.post(`${this.url}guardar.php`, JSON.stringify(lista));
  }

  actualizarNota(lista:Array<Nota>):Observable<any>{
    return this.http.post(`${this.url}actualizar.php`, JSON.stringify(lista));
  }

  eliminarNota(lista:Array<Nota>):Observable<any>{
    return this.http.post(`${this.url}eliminar.php`, JSON.stringify(lista));
  }

  
}
