import { Injectable, inject } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

export interface Contact {
  id: number;
  name: string;
  email: string;
  phone: string | null;
  company: string | null;
  position: string | null;
  active: boolean;
  created_at: string;
  updated_at: string;
}

@Injectable({
  providedIn: 'root'
})
export class ContactService {

  private http = inject(HttpClient);

  // URL CORRETA - ajuste a porta se necessário (geralmente 8000)
  private apiUrl = 'http://127.0.0.1:8000/api/subscribers';

  getContacts(): Observable<Contact[]> {
    return this.http.get<Contact[]>(this.apiUrl);
  }

  createContact(data: Partial<Contact>): Observable<Contact> {
    return this.http.post<Contact>(this.apiUrl, data);
  }
}
